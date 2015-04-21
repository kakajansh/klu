<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
use App\Template;
use Input;
use Validator;
use Redirect;
use Request;
use Session;

class TemplatesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $templates = Template::all();
        return view('templates.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('templates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // ////////////////// //
        // SINGLE FILE UPLOAD //
        // ////////////////// //
        //
        // $file = array('image' => Input::file('path'));
        // $rules = array('image' => 'required');
        // $validator = Validator::make($file, $rules);
        // if ($validator->fails())
        // {
        //     // send back to the page with the input data and errors
        //     return Redirect::to('upload')->withInput()->withErrors($validator);
        // }
        // else
        // {
        //     // checking file is valid.
        //     if (Input::file('path')->isValid())
        //     {
        //         $destinationPath = 'uploads'; // upload path
        //         $extension = Input::file('path')->getClientOriginalExtension(); // getting image extension
        //         $fileName = rand(11111,99999).'.'.$extension; // renameing image
        //         Input::file('path')->move($destinationPath, $fileName); // uploading file to given path
        //         // sending back with message
        //         Session::flash('success', 'Upload successfully');
        //         return Redirect::to('templates');
        //     }
        //     else
        //     {
        //         // sending back with error message.
        //         Session::flash('error', 'uploaded file is not valid');
        //         return Redirect::to('templates');
        //     }
        // }
        // //////////////////// //
        // MULTIPLE FILE UPLOAD //
        // //////////////////// //
        //
        $files = Input::file('files');
        $template = new Template();
        // Making counting of uploaded images
        $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;
        foreach($files as $file) {
            $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
            $validator = Validator::make(array('file'=> $file), $rules);
            if ($validator->passes())
            {
                $destinationPath = 'uploads';
                $filename = $file->getClientOriginalName();
                $filetype = $file->getClientOriginalExtension();
                $mime = substr($file->getMimeType(), 0, 5);
                $upload_success = $file->move($destinationPath, $filename);
                if ($filetype == 'pdf') {
                    $template->path = $destinationPath . '/' . $filename;;
                }
                else if ($mime == 'image') {
                    $template->thumb = $destinationPath . '/' . $filename;;
                }
                $uploadcount ++;
            }
        }
        if ($uploadcount == $file_count) {
            Session::flash('success', 'Upload successfully');
            $input = Request::all();
            $template->title = $input['title'];
            $template->body = $input['body'];
            $template->save();
            // $last = \Response::json(array('success' => true, 'last_insert_id' => $template->id), 200);
            return Redirect::to("templates/setup/$template->id");
        }
        else
        {
            return Redirect::to('templates')->withInput()->withErrors($validator);
        }
    }

    public function setup($id)
    {
        $template = Template::find($id);
        return view('templates.setup', compact('template'));
    }

    public function save($id)
    {
        $input = Request::except('_token');
        $template = Template::find($id);
        $template->settings = json_encode($input);
        $template->save();
        return Redirect::to("templates/$template->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $template = Template::findOrFail($id);
        return view('templates.show', compact('template'));
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
