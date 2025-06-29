@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Course Details</h2>
        <div class="space-x-2">
            <a href="{{ route('admin.courses.edit', $course->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                Edit Course
            </a>
            <a href="{{ route('admin.courses.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Back to List
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Basic Information -->
        <div class="bg-gray-50 p-6 rounded-lg">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Course Information</h3>
            <div class="space-y-3">
                <div>
                    <label class="text-sm font-medium text-gray-600">Course Name</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $course->name }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Course Code</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $course->code }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Credits</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $course->credits }}</p>
                </div>
            </div>
        </div>

        <!-- Additional Information -->
        <div class="bg-gray-50 p-6 rounded-lg">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Additional Information</h3>
            <div class="space-y-3">
                <div>
                    <label class="text-sm font-medium text-gray-600">Description</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $course->description ?: 'No description available' }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Created Date</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $course->created_at->format('F j, Y') }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Last Updated</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $course->updated_at->format('F j, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
