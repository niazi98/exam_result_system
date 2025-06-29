@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold text-blue-700 mb-6">Edit Exam</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong>Whoops! Something went wrong.</strong>
            <ul class="list-disc pl-5 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.exams.update', $exam->id) }}" method="POST" class="space-y-4">
        @csrf 
        @method('PUT')
        
        <!-- Exam Title -->
        <div>
            <label for="title" class="block text-gray-700 font-medium">Exam Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $exam->title) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400"
                   placeholder="Mid Term, Final, Quiz, etc." required>
        </div>

        <!-- Course -->
        <div>
            <label for="course_id" class="block text-gray-700 font-medium">Course</label>
            <select name="course_id" id="course_id"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400"
                    required>
                <option value="" disabled>Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id', $exam->course_id) == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Exam Date -->
        <div>
            <label for="exam_date" class="block text-gray-700 font-medium">Exam Date</label>
            <input type="date" name="exam_date" id="exam_date" value="{{ old('exam_date', $exam->exam_date) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400"
                   required>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('admin.exams.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Back
            </a>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Update Exam
            </button>
        </div>
    </form>
</div>
@endsection 