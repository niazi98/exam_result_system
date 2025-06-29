@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold text-blue-700 mb-4">Edit Course</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.courses.update', $course->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Course Name:</label>
            <input type="text" name="name" value="{{ old('name', $course->name) }}" class="w-full px-4 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Course Code:</label>
            <input type="text" name="code" value="{{ old('code', $course->code) }}" class="w-full px-4 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Credits:</label>
            <input type="number" name="credits" value="{{ old('credits', $course->credits) }}" class="w-full px-4 py-2 border rounded" min="1" max="6" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Description:</label>
            <textarea name="description" class="w-full px-4 py-2 border rounded" rows="3">{{ old('description', $course->description) }}</textarea>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.courses.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Course</button>
        </div>
    </form>
</div>
@endsection
