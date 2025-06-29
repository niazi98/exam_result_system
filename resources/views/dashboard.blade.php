@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <h2 class="text-2xl font-bold mb-6">Dashboard</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Students -->
        <a href="{{ route('students.index') }}" class="bg-blue-600 text-white text-center py-4 rounded shadow hover:bg-blue-700">
            Manage Students
        </a>

        <!-- Instructors -->
        <a href="{{ route('instructors.index') }}" class="bg-green-600 text-white text-center py-4 rounded shadow hover:bg-green-700">
            Manage Instructors
        </a>

        <!-- Courses -->
        <a href="{{ route('courses.index') }}" class="bg-purple-600 text-white text-center py-4 rounded shadow hover:bg-purple-700">
            Manage Courses
        </a>

        <!-- Exams -->
        <a href="{{ route('exams.index') }}" class="bg-yellow-500 text-white text-center py-4 rounded shadow hover:bg-yellow-600">
            Manage Exams
        </a>

        <!-- Results -->
        <a href="{{ route('results.index') }}" class="bg-red-500 text-white text-center py-4 rounded shadow hover:bg-red-600">
            Manage Results
        </a>
    </div>
</div>
@endsection
