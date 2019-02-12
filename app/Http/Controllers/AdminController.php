<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use Session;
use Redirect;

class AdminController extends Controller
{
	public function index()
	{
	// check if user is logged in and if that user is an Admin (Docent)
		if (Auth::check() && Auth::user()->role === 'admin') {
		} else {
			return back()->with('error', 'Access denied!');
		}
	// end check
		return view('admin.index');
	}

	public function addStudent() // view register student form
	{
	// check if user is logged in and if that user is an Admin (Docent)
		if (Auth::check() && Auth::user()->role === 'admin') {
		} else {
			return back()->with('error', 'Access denied!');
		}
	// end check
		return view('admin.addStudent');
	}

	public function store(Request $request) // save the request from the register student form
	{
	// check if user is logged in and if that user is an Admin (Docent)
		if (Auth::check() && Auth::user()->role === 'admin') {
		} else {
			return back()->with('error', 'Access denied!');
		}
	// end check

		// validate
        $rules = array(
            'name' => 'required',
            'classname' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed'],
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('docent/registreer/student')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store the user(Student)
            $user = new User;
            $user->name = Input::get('name');
            $user->classname = Input::get('classname');
            $user->email = Input::get('email');
            $user->password = bcrypt(Input::get('password'));
            $user->save();

            // redirect
            Session::flash('message', 'Successfully created user!');
            return Redirect::to('docent');
        }
		return view('admin.addStudent');
	}
}
