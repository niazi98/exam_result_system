<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Course;
use App\Models\Student;


use Illuminate\Http\Request;

class ExamController extends Controller
{
    // Show all exams
    public function index()
    {
        $exams = Exam::with('course')->get();
        return view('exams.index', compact('exams'));
    }

    // Show create exam form
   
public function create()
{
    $courses = Course::all();
    $students = Student::all();

    return view('exams.create', compact('courses', 'students'));
}

    // Store new exam
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'exam_date' => 'required|date',
            'course_id' => 'required|exists:courses,id',
        ]);

        Exam::create($request->all());

        return redirect()->route('admin.exams.index')->with('success', 'Exam created successfully!');
    }

    // Show single exam (optional, not used usually)
    public function show(Exam $exam)
    {
        return view('exams.show', compact('exam'));
    }

    // Show edit form
    public function edit(Exam $exam)
    {
        $courses = Course::all();
        return view('exams.edit', compact('exam', 'courses'));
    }

    // Update exam
    public function update(Request $request, Exam $exam)
    {
        $request->validate([
            'title' => 'required',
            'exam_date' => 'required|date',
            'course_id' => 'required|exists:courses,id',
        ]);

        $exam->update($request->all());

        return redirect()->route('admin.exams.index')->with('success', 'Exam updated successfully!');
    }

    // Delete exam
    public function destroy(Exam $exam)
    {
        $exam->delete();
        return redirect()->route('admin.exams.index')->with('success', 'Exam deleted successfully!');
    }
}
