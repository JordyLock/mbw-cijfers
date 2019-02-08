<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
	public function index()
	{
		CheckRole();
		return view('admin.index');
	}

	public function create()
	{
		//
	}

	public function store(Request $request)
	{
		//
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update(Request $request, $id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

	public function CheckRole()
	{
		if (Auth::check() && Auth::user()->role === 'admin') {
			return;
		} else {
			return back()->with('error', 'Access denied!');
		}
	}
}
