<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
use App\Course;
use App\Award;
use App\User;
use \Excel;
use App\Http\Requests\CourseRequest;

use Input;
use Validator;
use Redirect;
use Request;
use Session;

use RandomLib\Factory;

class CoursesController extends Controller {

    public function __construct()
    {
        $this->loadAndAuthorizeResource();
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$courses = Course::all();
		return view('courses.index', compact('courses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$templates = \DB::table('templates')->orderBy('title', 'asc')->lists('title','id');
		return view('courses.create', compact('templates'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CourseRequest $request)
	{
		$input = $request->all();
		$input['template_id'] = (int)$request->input('template_id');
		Course::create($input);
		return redirect('courses');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$course = Course::findOrFail($id);
		$templates = \DB::table('templates')->orderBy('title', 'asc')->lists('title','id');

		return view('courses.edit', compact('course', 'templates'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CourseRequest $request)
	{
		$course = Course::findOrFail($id);

		$course->update($request->all());

		return redirect('courses');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function destroy($id)
    {
        Course::destroy($id);
        return redirect('courses');
    }

	public function upload($id)
	{
		return view('courses.upload', compact('id'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$course = Course::findBySlug($slug);
		return view('courses.show', compact('course'));
	}

	// BU FONKSYON KULLANILMIYOR
	public function attend($id)
	{
		$user = \Auth::user()->id;

		$award = Award::firstOrCreate(['course_id' => $id, 'user_id' => $user]);

		$course = Course::find($id);
		return redirect("/courses/$course->slug");
	}

	public function storeUsers()
	{
		$factory = new Factory;
		$file = array('file' => Input::file('file'));
		$rules = array('file' => 'required');
		$validator = Validator::make($file, $rules);

		if ($validator->fails()) {
		    return Redirect::to('courses')->withInput()->withErrors($validator);
	    }
	    else {
			if (Input::file('file')->isValid()) {
				$destinationPath = 'uploads'; // upload path
				$extension = Input::file('file')->getClientOriginalExtension(); // getting file extension
				$fileName = rand(11111,99999).'.'.$extension; // renameing file
				Input::file('file')->move($destinationPath, $fileName); // uploading file to given path
				// sending back with message
				Session::flash('success', 'Upload successfully');
				$file = $destinationPath . '/' . $fileName;

				$reader = Excel::load($file)->get();

				foreach ($reader as $sheet) {
					// Excel dosyasinin her satiri
					// $reader->each(function($sheet) {
						$usr = User::where('ogrno', $sheet->no)->first();

						// Boyle bir kullanici yoksa ekle, yoksa gec
						if (is_null($usr)) {
							$user = User::firstOrCreate([
								'ad' => $sheet->ad,
								'soyad' => $sheet->soyad,
								'ogrno' => $sheet->no,
								'email' => $sheet->email,
								'password' => \Hash::make($sheet->tc)
							]);
							$usr = $user;
						}

						$courseId = Request::input('courseid');
						$generator = $factory->getLowStrengthGenerator();

						// Kullanici bu kursa kayitli degilse
						if (! \DB::select('select * from course_user where user_id='.$usr->id.' and course_id='.$courseId)) {
							$usr->courses()->attach($courseId, array('checkno' => $generator->generateString(11, '123456789')));
						}
					// });
				}
				return Redirect::to('courses');
			}
			else {
				// sending back with error message.
				Session::flash('error', 'uploaded file is not valid');
				return Redirect::to('courses');
			}
		}
	}

}
