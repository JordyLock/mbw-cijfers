<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
	public function index()
	{
		$this->CheckRole(Auth::check(), Auth::user());
		return view('admin.index');
	}

	public function addStudent() // view register student form
	{
		$this->CheckRole();
		return view('admin.addStudent');
	}

	public function store(Request $request) // save the request from the register student form
	{
		$this->CheckRole();
		// validate
        $rules = array(
            'name' => 'required',
            'classname' => 'required',
            'email' => 'required|email',
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
            $user->password = Input::get('password');
            $user->save();

            // redirect
            Session::flash('message', 'Successfully created user!');
            return Redirect::to('docent');
        }
		return view('admin.addStudent');
	}

	public function CheckRole($check, $role) // function to validate that current user is indeed a teacher(admin)
	{
		if ($check && $role->role === 'admin') {
			echo "test";
		} else {
			return back()->with('error', 'Access denied!');
		}
	}
}
