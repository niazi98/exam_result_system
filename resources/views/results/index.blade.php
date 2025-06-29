@extends('layouts.app')

@section('content')



<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Result Management</h2>
            <a href="{{ route('admin.results.create') }}"
                class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                Add New Result
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-200 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left border border-gray-200 bg-white shadow-sm">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3 border-b">#</th>
                        <th class="px-6 py-3 border-b">Student</th>
                        <th class="px-6 py-3 border-b">Course</th>
                        <th class="px-6 py-3 border-b">Exam</th>
                        <th class="px-6 py-3 border-b">Grade</th>
                        <th class="px-6 py-3 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-3">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3">{{ $result->student->name ?? 'N/A' }}</td>
                            <td class="px-6 py-3">{{ $result->course->name ?? 'N/A' }}</td>
                            <td class="px-6 py-3">{{ $result->exam->title ?? 'N/A' }}</td>
                            <td class="px-6 py-3 font-semibold">{{ $result->grade }}</td>
                            <td class="px-6 py-3">
                                <a href="{{ route('admin.results.show', $result->id) }}"
                                    class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded text-xs mr-1">
                                    View
                                </a>
                                <a href="{{ route('admin.results.edit', $result->id) }}"
                                    class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs mr-1">
                                    Edit
                                </a>
                                <form action="{{ route('admin.results.destroy', $result->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($results->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">No results found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
