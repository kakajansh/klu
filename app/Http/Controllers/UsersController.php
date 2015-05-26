<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;

use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller {

    public function __construct()
    {
        $this->loadAndAuthorizeResource();
    }

    public function index()
    {
        $users = \App\User::all();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = \App\User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit()
    {
        $user = array_except(\Auth::user(), ['password']);
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request)
    {
        $user = \Auth::user();
        $user->ad = $request->ad;
        $user->soyad = $request->soyad;
        $user->password = \Hash::make($request->password);
        $user->save();
        // $user-> = $request->ad;
        return redirect('/');
    }

    public function profile()
    {
        $user = \Auth::user();
        return view('users.show', compact('user'));
    }

}
