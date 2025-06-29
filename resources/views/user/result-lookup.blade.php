@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Result Lookup</h1>
            
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('result.lookup.process') }}" class="space-y-6">
                @csrf
                
                <div>
                    <label for="registration_number" class="block text-sm font-medium text-gray-700 mb-2">
                        Registration Number
                    </label>
                    <input type="text" 
                           id="registration_number" 
                           name="registration_number" 
                           value="{{ old('registration_number') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Enter your registration number"
                           required>
                    @error('registration_number')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="student_type" class="block text-sm font-medium text-gray-700 mb-2">
                        Student Type
                    </label>
                    <select id="student_type" 
                            name="student_type" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            required>
                        <option value="">Select student type</option>
                        <option value="undergraduate" {{ old('student_type') == 'undergraduate' ? 'selected' : '' }}>
                            Undergraduate
                        </option>
                        <option value="graduate" {{ old('student_type') == 'graduate' ? 'selected' : '' }}>
                            Graduate
                        </option>
                    </select>
                    @error('student_type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" 
                            class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                        Check Results
                    </button>
                    
                    <a href="{{ route('user.dashboard') }}" 
                       class="text-blue-600 hover:text-blue-800 transition">
                        Back to Dashboard
                    </a>
                </div>
            </form>

            <div class="mt-8 p-4 bg-gray-50 rounded-md">
                <h3 class="font-semibold text-gray-800 mb-2">Instructions:</h3>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>• Enter your exact registration number as provided by the university</li>
                    <li>• Select whether you are an undergraduate or graduate student</li>
                    <li>• Your results will be displayed immediately after verification</li>
                    <li>• For any issues, please contact the administration office</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection 