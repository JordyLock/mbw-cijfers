<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Redirect;
use Session;

class AdminController extends Controller
{
	public function index()
	{
		return view('admin.index');
	}

	public function addStudent() // view register student form
	{
		return view('admin.addStudent');
	}

	public function store(Request $request) // save the request from the register student form
	{
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
