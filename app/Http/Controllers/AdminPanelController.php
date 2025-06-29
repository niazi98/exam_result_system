<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Instructor;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    /**
     * Show admin dashboard
     */
    public function dashboard()
    {
        $stats = [
            'total_students' => Student::count(),
            'total_instructors' => Instructor::count(),
            'total_courses' => Course::count(),
            'total_exams' => Exam::count(),
            'total_results' => Result::count(),
            'undergraduate_students' => Student::where('student_type', 'undergraduate')->count(),
            'graduate_students' => Student::where('student_type', 'graduate')->count(),
        ];

        $recent_students = Student::latest()->take(5)->get();
        $recent_results = Result::with(['student', 'course'])->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_students', 'recent_results'));
    }

    /**
     * Show user management
     */
    public function userManagement()
    {
        $users = User::all();
        return view('admin.user-management', compact('users'));
    }

    /**
     * Update user role
     */
    public function updateUserRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,user'
        ]);

        $user->update(['role' => $request->role]);

        return back()->with('success', 'User role updated successfully.');
    }

    /**
     * Show system statistics
     */
    public function statistics()
    {
        $stats = [
            'total_students' => Student::count(),
            'total_instructors' => Instructor::count(),
            'total_courses' => Course::count(),
            'total_exams' => Exam::count(),
            'total_results' => Result::count(),
            'undergraduate_students' => Student::where('student_type', 'undergraduate')->count(),
            'graduate_students' => Student::where('student_type', 'graduate')->count(),
        ];

        $departmentStats = Student::selectRaw('department, count(*) as count')
                                 ->groupBy('department')
                                 ->get();

        $gradeDistribution = Result::selectRaw('grade, count(*) as count')
                                  ->groupBy('grade')
                                  ->get();

        return view('admin.statistics', compact('stats', 'departmentStats', 'gradeDistribution'));
    }
}
