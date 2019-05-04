<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('id_number', 'asc')->paginate(10);
        return view('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_number' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'mname' => 'required',
            'date_of_birth' => 'required',
        ]);

        $student = new Student;
        $student->id_number = $request->input('id_number');
        $student->fname = $request->input('fname');
        $student->lname = $request->input('lname');
        $student->mname = $request->input('mname');
        $student->date_of_birth = $request->input('date_of_birth');
        $student->save();

        return redirect('/students/create')->with('success', 'Student Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.view')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit')->with('student', $student);
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
        $this->validate($request, [
            'id_number' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'mname' => 'required',
            'date_of_birth' => 'required',
        ]);

        $student = Student::find($id);
        $student->id_number = $request->input('id_number');
        $student->fname = $request->input('fname');
        $student->lname = $request->input('lname');
        $student->mname = $request->input('mname');
        $student->date_of_birth = $request->input('date_of_birth');
        $student->save();

        return redirect('/students'.'/'.$student->id)->with('success', 'Student Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('students')->with('success', 'Student Deleted');
    }
}
