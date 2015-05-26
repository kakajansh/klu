<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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

    public function profile()
    {
        $user = \Auth::user();
        return view('users.show', compact('user'));
    }

}
