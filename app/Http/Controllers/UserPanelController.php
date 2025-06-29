<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Result;
use Illuminate\Http\Request;

class UserPanelController extends Controller
{
    /**
     * Show the result lookup form
     */
    public function showResultLookup()
    {
        return view('user.result-lookup');
    }

    /**
     * Process result lookup
     */
    public function lookupResult(Request $request)
    {
        $request->validate([
            'registration_number' => 'required|string',
            'student_type' => 'required|in:undergraduate,graduate'
        ]);

        $student = Student::where('registration_number', $request->registration_number)
                         ->where('student_type', $request->student_type)
                         ->first();

        if (!$student) {
            return back()->with('error', 'Student not found with the provided registration number and student type.');
        }

        $results = $student->results()->with('course')->get();
        $gpa = $student->calculateGPA();

        return view('user.result-display', compact('student', 'results', 'gpa'));
    }

    /**
     * Show unofficial transcript
     */
    public function showTranscript(Request $request)
    {
        $request->validate([
            'registration_number' => 'required|string',
            'student_type' => 'required|in:undergraduate,graduate'
        ]);

        $student = Student::where('registration_number', $request->registration_number)
                         ->where('student_type', $request->student_type)
                         ->first();

        if (!$student) {
            return back()->with('error', 'Student not found with the provided registration number and student type.');
        }

        $transcript = $student->getTranscript();
        $gpa = $student->calculateGPA();

        return view('user.transcript', compact('student', 'transcript', 'gpa'));
    }

    /**
     * Show user dashboard
     */
    public function dashboard()
    {
        return view('user.dashboard');
    }
}
