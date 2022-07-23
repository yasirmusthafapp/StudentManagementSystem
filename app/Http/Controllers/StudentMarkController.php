<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentMark;
use Illuminate\Http\Request;

class StudentMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['marks'] = StudentMark::paginate(5);
        return view('marks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['students'] = Student::pluck('name','id');
        return view('marks.create', $data);
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
            'student_id' => 'required',
            'term' => 'required',
            'maths' => 'required|numeric',
            'science' => 'required|numeric',
            'history' => 'required|numeric',
        ]);
        $student = new StudentMark();
        $student->student_id = $request->student_id;
        $student->term = $request->term;
        $student->maths = $request->maths;
        $student->science = $request->science;
        $student->history = $request->history;
        $student->save();
        return redirect()->route('marks.index')
            ->with('success', 'Mark has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentMark $mark)
    {
        $students = Student::pluck('name','id');
        return view('marks.edit', compact('mark','students'));
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
            'student_id' => 'required',
            'term' => 'required',
            'maths' => 'required|numeric',
            'science' => 'required|numeric',
            'history' => 'required|numeric',
        ]);
        $student = StudentMark::find($id);
        $student->student_id = $request->student_id;
        $student->term = $request->term;
        $student->maths = $request->maths;
        $student->science = $request->science;
        $student->history = $request->history;
        $student->save();
        return redirect()->route('marks.index')
            ->with('success', 'Mark Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentMark $mark)
    {
        $mark->delete();
        return redirect()->route('marks.index')
            ->with('success', 'Mark has been deleted successfully');
    }
}
