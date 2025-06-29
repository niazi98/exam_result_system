@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <div class="max-w-6xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-8">
            <!-- Header -->
            <div class="text-center border-b border-gray-200 pb-6 mb-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">UNOFFICIAL TRANSCRIPT</h1>
                <p class="text-gray-600">This is an unofficial transcript for internal use only</p>
            </div>

            <!-- Student Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-600">Student Name</p>
                        <p class="font-semibold text-lg">{{ $student->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Registration Number</p>
                        <p class="font-semibold">{{ $student->registration_number }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Email</p>
                        <p class="font-semibold">{{ $student->email }}</p>
                    </div>
                </div>
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-600">Department</p>
                        <p class="font-semibold">{{ $student->department }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Student Type</p>
                        <p class="font-semibold capitalize">{{ $student->student_type }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Gender</p>
                        <p class="font-semibold capitalize">{{ $student->gender }}</p>
                    </div>
                </div>
            </div>

            <!-- Academic Summary -->
            <div class="bg-blue-50 rounded-lg p-6 mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Academic Summary</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600">{{ $gpa }}</div>
                        <p class="text-sm text-gray-600">Cumulative GPA</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-green-600">{{ $transcript->count() }}</div>
                        <p class="text-sm text-gray-600">Total Courses</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-purple-600">
                            {{ $transcript->sum(function($result) { return $result->course->credits ?? 3; }) }}
                        </div>
                        <p class="text-sm text-gray-600">Total Credits</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-600">
                            {{ $transcript->whereIn('grade', ['A', 'A+'])->count() }}
                        </div>
                        <p class="text-sm text-gray-600">A Grades</p>
                    </div>
                </div>
            </div>

            <!-- Course History -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Course History</h2>
                
                @if($transcript->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Course Code
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Course Name
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Credits
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Grade
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Grade Points
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Semester
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($transcript as $result)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $result->course->code ?? 'N/A' }}
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-900">
                                            {{ $result->course->name ?? 'N/A' }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $result->course->credits ?? 3 }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                                {{ $result->grade == 'A' || $result->grade == 'A+' ? 'bg-green-100 text-green-800' : '' }}
                                                {{ $result->grade == 'B' || $result->grade == 'B+' ? 'bg-blue-100 text-blue-800' : '' }}
                                                {{ $result->grade == 'C' || $result->grade == 'C+' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                {{ $result->grade == 'D' || $result->grade == 'D+' ? 'bg-orange-100 text-orange-800' : '' }}
                                                {{ $result->grade == 'F' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800' }}">
                                                {{ $result->grade }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $student->getGradePoints($result->grade) }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $result->created_at ? $result->created_at->format('Y-m') : 'N/A' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No transcript data available</h3>
                        <p class="mt-1 text-sm text-gray-500">No course records have been found for this student.</p>
                    </div>
                @endif
            </div>

            <!-- Grade Legend -->
            <div class="bg-gray-50 rounded-lg p-4 mb-8">
                <h3 class="font-semibold text-gray-800 mb-3">Grade Legend</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-2 text-sm">
                    <div class="flex items-center">
                        <span class="inline-block w-4 h-4 bg-green-100 rounded mr-2"></span>
                        A/A+ = 4.0
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-4 h-4 bg-blue-100 rounded mr-2"></span>
                        B/B+ = 3.0-3.3
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-4 h-4 bg-yellow-100 rounded mr-2"></span>
                        C/C+ = 2.0-2.3
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-4 h-4 bg-red-100 rounded mr-2"></span>
                        F = 0.0
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="border-t border-gray-200 pt-6">
                <div class="flex flex-col sm:flex-row justify-between items-center">
                    <div class="text-sm text-gray-600 mb-4 sm:mb-0">
                        <p>Generated on: {{ now()->format('F j, Y \a\t g:i A') }}</p>
                        <p>This is an unofficial transcript for internal use only</p>
                    </div>
                    <div class="flex space-x-4">
                        <button onclick="window.print()" 
                                class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                            </svg>
                            Print
                        </button>
                        <a href="{{ route('user.dashboard') }}" 
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Back to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@media print {
    .container { max-width: none; }
    button, a { display: none; }
}
</style>
@endsection 