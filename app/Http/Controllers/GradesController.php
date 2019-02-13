<?php

namespace App\Http\Controllers;

use App\User;
use App\Grade;
use Illuminate\Http\Request;
use Auth;
use App\Grade;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('grades/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAdd()
    {
        if (Auth::check())
        {
            $grades = \App\Grade::all();
            return view('grades/add', compact('grades'));
        }
        else {

        return back()->withErrors(['Je bent niet bevoegd om op deze pagina te komen']);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = User::findOrFail($id);
        $grades = Grade::where('user_id', $id)
                            ->orderBy('subject', 'DESC')
                            ->orderBy('id', 'DESC')
                            ->get();

        return view('grades.show', compact('grades', 'student'));//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
