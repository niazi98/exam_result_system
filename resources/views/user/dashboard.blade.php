@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Student Portal</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Result Lookup Card -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold ml-3">Check Results</h2>
                </div>
                <p class="text-gray-600 mb-4">Look up your exam results using your registration number.</p>
                <a href="{{ route('result.lookup') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Check Results
                </a>
            </div>

            <!-- Transcript Card -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-green-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold ml-3">Unofficial Transcript</h2>
                </div>
                <p class="text-gray-600 mb-4">View your complete academic transcript and GPA.</p>
                <a href="{{ route('transcript.show') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                    View Transcript
                </a>
            </div>
        </div>

        <!-- Quick Info -->
        <div class="mt-8 bg-gray-50 rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Quick Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                <div>
                    <strong>Registration Number:</strong> Required for result lookup
                </div>
                <div>
                    <strong>Student Type:</strong> Select Undergraduate or Graduate
                </div>
                <div>
                    <strong>Unofficial Transcript:</strong> Shows all courses and grades
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 