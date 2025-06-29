<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:courses,code',
            'credits' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        Course::create($validated);
        return redirect()->route('admin.courses.index')->with('success', 'Course added successfully!');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:courses,code,' . $course->id,
            'credits' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $course->update($validated);
        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully!');
    }
}
