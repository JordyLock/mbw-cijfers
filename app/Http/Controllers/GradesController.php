<?php

namespace App\Http\Controllers;

use App\User;
use App\Grade;
use Illuminate\Http\Request;
use Auth;


class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        return view('grades/index')->with('grades', $grades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAdd()
    {
            $grades = Grade::all();
            $users = User::all()->where('role', '=', 'student');
            return view('grades/add', compact('grades', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'subject'=>'required',
            'grade'=>'required',
            'test_name'=>'required',
            'description'=>'required'
        ]);
        $grades = new Grade([

            'subject'=> $request->get('subject'),
            'grade'=> $request->get('grade'),
            'user_id'=> $request->get('user_id'),
            'test_name'=> $request->get('test_name'),
            'description'=> $request->get('description')
        ]);
        $grades->save();
        return redirect('/student/cijfers')->with('success', 'grade toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $student = User::findOrFail($id);
    //     $grades = Grade::where('user_id', $id)
    //                         ->orderBy('subject', 'DESC')
    //                         ->orderBy('id', 'DESC')
    //                         ->get();

    //     return view('grades.show', compact('grades', 'student'));//
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check() && Auth::user()->role === 'admin')
        {
            $grade = Grade::find($id);
            $users = User::all()->where('role', '=', 'student');
            return view('grades.edit', compact('grade', 'users'));
        }
        else {

        return back()->withErrors(['Je bent niet bevoegd om op deze pagina te komen']);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required',
            'user_id'=>'required',
            'grade'=>'required',
            'test'=>'required',
            'description'=>'required'
        ]);

        $grade = Grade::find($id);
        $grade->subject = $request->subject;
        $grade->grade = $request->grade;
        $grade->user_id = $request->user_id;
        $grade->test_name = $request->test;
        $grade->description = $request->description;
        $grade->save();

        return redirect()->back()->with('message', 'Cijfer aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check() && Auth::user()->role === 'admin')
        {
            $grades = Grade::all();

            $grade = Grade::find($id);
            if($grade != null) {
                $grade->delete();
                return redirect()->back()->with('grades', $grades)->with('message', 'Cijfer verwijderd');
            } else {
                return view('grades.index')->with('grades', $grades);
            }
        }
    }
}
