@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-8">
            <!-- Student Information -->
            <div class="border-b border-gray-200 pb-6 mb-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Student Results</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Name</p>
                        <p class="font-semibold">{{ $student->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Registration Number</p>
                        <p class="font-semibold">{{ $student->registration_number }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Department</p>
                        <p class="font-semibold">{{ $student->department }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Student Type</p>
                        <p class="font-semibold capitalize">{{ $student->student_type }}</p>
                    </div>
                </div>
            </div>

            <!-- GPA Summary -->
            <div class="bg-blue-50 rounded-lg p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Academic Summary</h2>
                <div class="flex items-center">
                    <div class="text-3xl font-bold text-blue-600 mr-4">{{ $gpa }}</div>
                    <div>
                        <p class="text-sm text-gray-600">Current GPA</p>
                        <p class="text-sm text-gray-800">Based on {{ $results->count() }} course(s)</p>
                    </div>
                </div>
            </div>

            <!-- Results Table -->
            <div class="overflow-x-auto">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Course Results</h2>
                
                @if($results->count() > 0)
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Course Code
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Course Name
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Grade
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Credits
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($results as $result)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $result->course->code ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
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
                @else
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No results found</h3>
                        <p class="mt-1 text-sm text-gray-500">No course results have been recorded yet.</p>
                    </div>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex flex-col sm:flex-row gap-4">
                <a href="{{ route('result.lookup') }}" 
                   class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Check Another Result
                </a>
                
                <a href="{{ route('transcript.show', ['registration_number' => $student->registration_number, 'student_type' => $student->student_type]) }}" 
                   class="inline-flex justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    View Transcript
                </a>
                
                <a href="{{ route('user.dashboard') }}" 
                   class="inline-flex justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 