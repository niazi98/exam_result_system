@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-8 shadow rounded-xl">
    <h2 class="text-2xl font-bold mb-6">Edit Result</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.results.update', $result->id) }}" method="POST">
        @csrf 
        @method('PUT')
        
        <!-- Student Dropdown -->
        <div class="mb-4">
            <label for="student_id" class="block text-gray-700 font-semibold mb-2">Student</label>
            <select name="student_id" id="student_id" required class="w-full border border-gray-300 p-2 rounded">
                <option value="">Select Student</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ old('student_id', $result->student_id) == $student->id ? 'selected' : '' }}>
                        {{ $student->name }} ({{ $student->registration_number }})
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Course Dropdown -->
        <div class="mb-4">
            <label for="course_id" class="block text-gray-700 font-semibold mb-2">Course</label>
            <select name="course_id" id="course_id" required class="w-full border border-gray-300 p-2 rounded">
                <option value="">Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id', $result->course_id) == $course->id ? 'selected' : '' }}>
                        {{ $course->name }} ({{ $course->code }})
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Exam Dropdown -->
        <div class="mb-4">
            <label for="exam_id" class="block text-gray-700 font-semibold mb-2">Exam</label>
            <select name="exam_id" id="exam_id" required class="w-full border border-gray-300 p-2 rounded">
                <option value="">Select Exam</option>
                @foreach($exams as $exam)
                    <option value="{{ $exam->id }}" {{ old('exam_id', $result->exam_id) == $exam->id ? 'selected' : '' }}>
                        {{ $exam->title }} - {{ $exam->course->name ?? 'N/A' }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Grade -->
        <div class="mb-4">
            <label for="grade" class="block text-gray-700 font-semibold mb-2">Grade</label>
            <input type="text" name="grade" id="grade" value="{{ old('grade', $result->grade) }}" required placeholder="e.g. A, B, C" class="w-full border border-gray-300 p-2 rounded">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.results.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Result</button>
        </div>
    </form>
</div>
@endsection
