<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index()
    {
        $instructors = Instructor::all();
        return view('instructors.index', compact('instructors'));
    }

    public function create()
    {
        return view('instructors.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:instructors,email',
        'department' => 'required',
    ]);

    Instructor::create($request->all());

    return redirect()->route('admin.instructors.index')->with('success', 'Instructor added successfully!');
}


    public function show(Instructor $instructor)
    {
        return view('instructors.show', compact('instructor'));
    }

    public function edit(Instructor $instructor)
    {
        return view('instructors.edit', compact('instructor'));
    }

    public function update(Request $request, Instructor $instructor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors,email,' . $instructor->id,
            'department' => 'required|string|max:255',
        ]);

        $instructor->update($request->all());
        return redirect()->route('admin.instructors.index')->with('success', 'Instructor updated successfully!');
    }

    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
        return redirect()->route('admin.instructors.index')->with('success', 'Instructor deleted successfully!');
    }
}
