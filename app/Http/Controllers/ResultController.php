<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use App\Models\Course;
use App\Models\Exam;
use Illuminate\Http\Request;

class ResultController extends Controller
{
   public function index()
{
    $results = Result::with(['student', 'course', 'exam'])->get();
    return view('results.index', compact('results'));
}


    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        $exams = Exam::all();
        return view('results.create', compact('students', 'courses', 'exams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'exam_id' => 'required|exists:exams,id',
            'grade' => 'required|string|max:5',
        ]);

        // Prevent duplicate result
        $existing = Result::where('student_id', $request->student_id)
                          ->where('course_id', $request->course_id)
                          ->where('exam_id', $request->exam_id)
                          ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Result already exists for this student, course, and exam.');
        }

        Result::create([
            'student_id' => $request->student_id,
            'course_id' => $request->course_id,
            'exam_id' => $request->exam_id,
            'grade' => $request->grade,
        ]);

        return redirect()->route('admin.results.index')->with('success', 'Result added successfully.');
    }

    public function edit(Result $result)
    {
        $students = Student::all();
        $courses = Course::all();
        $exams = Exam::all();
        return view('results.edit', compact('result', 'students', 'courses', 'exams'));
    }

    public function update(Request $request, Result $result)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'exam_id' => 'required|exists:exams,id',
            'grade' => 'required|string|max:5',
        ]);

        $result->update($request->all());

        return redirect()->route('admin.results.index')->with('success', 'Result updated.');
    }

    public function destroy(Result $result)
    {
        $result->delete();
        return redirect()->route('admin.results.index')->with('success', 'Result deleted.');
    }

    public function show(Result $result)
    {
        return view('results.show', compact('result'));
    }
}
