<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use Auth;

class StudentController extends Controller
{
    public function grades()
    {
        $grades = Grade::where('user_id', Auth::id())->get();

        return view('student.grades')->with('grades', $grades);
    }
}
