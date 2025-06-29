<!-- resources/views/students/show.blade.php -->

@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-blue-700">Student Details</h2>
        <div class="space-x-2">
            <a href="{{ route('admin.students.edit', $student->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                Edit Student
            </a>
            <a href="{{ route('admin.students.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Back to List
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Basic Information -->
        <div class="bg-gray-50 p-6 rounded-lg">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Basic Information</h3>
            <div class="space-y-3">
                <div>
                    <label class="text-sm font-medium text-gray-600">Registration Number</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $student->registration_number }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Full Name</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $student->name }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Email Address</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $student->email }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Gender</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $student->gender }}</p>
                </div>
            </div>
        </div>

        <!-- Academic Information -->
        <div class="bg-gray-50 p-6 rounded-lg">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Academic Information</h3>
            <div class="space-y-3">
                <div>
                    <label class="text-sm font-medium text-gray-600">Department</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $student->department }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Student Type</label>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                        {{ $student->student_type === 'graduate' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                        {{ ucfirst($student->student_type) }}
                    </span>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Created Date</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $student->created_at->format('F j, Y') }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Last Updated</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $student->updated_at->format('F j, Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Student Results -->
    <div class="mt-8">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Student Results</h3>
        @if($student->results->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grade</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Credits</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($student->results as $result)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $result->course->name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                        {{ $result->grade == 'A' || $result->grade == 'A+' ? 'bg-green-100 text-green-800' : '' }}
                                        {{ $result->grade == 'B' || $result->grade == 'B+' ? 'bg-blue-100 text-blue-800' : '' }}
                                        {{ $result->grade == 'C' || $result->grade == 'C+' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                        {{ $result->grade == 'D' || $result->grade == 'D+' ? 'bg-orange-100 text-orange-800' : '' }}
                                        {{ $result->grade == 'F' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800' }}">
                                        {{ $result->grade }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $result->course->credits ?? 3 }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-8 bg-gray-50 rounded-lg">
                <p class="text-gray-600">No results found for this student.</p>
            </div>
        @endif
    </div>
</div>

@endsection
