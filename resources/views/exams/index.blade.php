@extends('layouts.app')

@section('title', 'Exams')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Exams</h1>
        <a href="{{ route('admin.exams.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Create New Exam</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">Title</th>
                    <th class="py-3 px-6 text-left">Course</th>
                    <th class="py-3 px-6 text-left">Date</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                @forelse ($exams as $exam)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $exam->title }}</td>
                        <td class="py-3 px-6 text-left">{{ $exam->course->name ?? 'N/A' }}</td>
                        <td class="py-3 px-6 text-left">{{ \Carbon\Carbon::parse($exam->date)->format('Y-m-d') }}</td>
                        <td class="py-3 px-6 text-left">
                            <a href="{{ route('admin.exams.show', $exam->id) }}"
                               class="bg-blue-400 text-white px-3 py-1 rounded hover:bg-blue-500 transition">View</a>
                            <a href="{{ route('admin.exams.edit', $exam->id) }}"
                               class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 transition">Edit</a>
                            <form action="{{ route('admin.exams.destroy', $exam->id) }}" method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">No exams available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
