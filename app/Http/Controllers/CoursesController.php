<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
use App\Course;
use App\Award;
use App\User;
use \Excel;

use Input;
use Validator;
use Redirect;
use Request;
use Session;

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
		// $sayi = Course->users;
		// echo $sayi;
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
	public function store()
	{
		$input = Request::all();
		$input['template_id'] = \App\Template::find(10)->id;
		Course::create($input);
		return redirect('courses');
	}

	public function storeUsers()
	{
		$file = array('file' => Input::file('file'));
		$courseid = Request::input('courseid');

		echo $courseid;
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

				Excel::load($file, function($reader) {
					// $results = $reader->get();
					// echo $results;
					//
					$reader->each(function($sheet) {
						$userId;
						$u = User::where('ogrno', $sheet->no)->first();

						if (is_null($u)) {
							echo "HI";
							$user = User::firstOrCreate([
								'ad' => $sheet->ad,
								'soyad' => $sheet->soyad,
								'ogrno' => $sheet->no,
								'email' => $sheet->email,
								'password' => \Hash::make($sheet->tc)
							]);
							$userId = $user->id;
						}
						else {
							$userId = $u->id;
						}

						Award::firstOrCreate([
							'user_id' => $userId,
							'course_id' => Request::input('courseid')
						]);
					});
				});
				return Redirect::to('courses');
			}
			else {
				// sending back with error message.
				Session::flash('error', 'uploaded file is not valid');
				return Redirect::to('courses');
			}
		}
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

	public function attend($id)
	{
		$user = \Auth::user()->id;
		// $a = Award::find(array('course_id' => $id, 'user_id' => $user));

		// if ($a === null)
		// {
		// 	$award = new Award();
		// 	$award->course_id = $id;
		// 	$award->user_id = $user;
		// 	$award->save();
		// }
		// else
		// {
		// 	echo "ALREADY HAVE ONE";
		// }

		$award = Award::firstOrCreate(['course_id' => $id, 'user_id' => $user]);

		$course = Course::find($id);
		return redirect("/courses/$course->slug");
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
