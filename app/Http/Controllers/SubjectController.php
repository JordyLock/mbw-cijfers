<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index')->with('subjects', $subjects);
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('subjects.addSubject', compact('subjects'));
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
            'name'=>'required',
        ]);
        $subjects = new Subject([
            'name'=> $request->get('name'),
        ]);
        $subjects->save();
        return redirect('vak')->with('success', 'Vak toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.viewSubject', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $subject = Subject::find($id);
            return view('subjects.editSubject', compact('subject')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $subject = Subject::find($id);
        $subject->name = $request->name;
        $subject->save();

        return redirect()->back()->with('message', 'Vak aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            $subject = subject::find($id);
            if($subject != null) {
                $subject->delete();
                return redirect()->back()->with('message', 'Vak verwijderd');
            } else {
                return view('subjects.index')->with('subjects', $subjects);
            }
    }
}
