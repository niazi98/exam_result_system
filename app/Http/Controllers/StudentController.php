<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'registration_number' => 'required|unique:students,registration_number',
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'department' => 'required',
            'gender' => 'required',
            'student_type' => 'required|in:undergraduate,graduate',
        ]);

        // Create new student
        Student::create([
            'registration_number' => $request->registration_number,
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'gender' => $request->gender,
            'student_type' => $request->student_type,
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Student added successfully!');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        
        $request->validate([
            'registration_number' => 'required|unique:students,registration_number,' . $id,
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $id,
            'department' => 'required',
            'gender' => 'required',
            'student_type' => 'required|in:undergraduate,graduate',
        ]);

        $student->update($request->all());
        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect()->route('admin.students.index')->with('success', 'Student deleted successfully!');
    }
}
