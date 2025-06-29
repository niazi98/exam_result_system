@extends('layouts.app')
<!-- Navigation Bar -->


@section('content')
<!-- Navigation Bar -->
<!-- Top Navigation -->



    <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-700">Course Management</h2>
            <a href="{{ route('admin.courses.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                Add New Course
            </a>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Code</th>
                        <th class="px-6 py-3">Credits</th>
                        <th class="px-6 py-3">Description</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($courses as $index => $course)
                        <tr>
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $course->name }}</td>
                            <td class="px-6 py-4">{{ $course->code }}</td>
                            <td class="px-6 py-4">{{ $course->credits }}</td>
                            <td class="px-6 py-4">{{ Str::limit($course->description, 50) }}</td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a href="{{ route('admin.courses.show', $course->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded text-xs">View</a>
                                <a href="{{ route('admin.courses.edit', $course->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-xs">Edit</a>
                                <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded text-xs">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
