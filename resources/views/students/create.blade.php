@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold text-blue-700 mb-6">Add New Student</h2>

    {{-- ✅ Show validation errors --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong>Whoops! Something went wrong.</strong>
            <ul class="list-disc pl-5 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ✅ Show success message --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.students.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Registration Number -->
        <div>
            <label for="registration_number" class="block text-gray-700 font-medium">Registration Number</label>
            <input type="text" name="registration_number" id="registration_number" value="{{ old('registration_number') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" required>
        </div>

        <!-- Name -->
        <div>
            <label for="name" class="block text-gray-700 font-medium">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" required>
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-gray-700 font-medium">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" required>
        </div>

        <!-- Department -->
        <div>
            <label for="department" class="block text-gray-700 font-medium">Department</label>
            <input type="text" name="department" id="department" value="{{ old('department') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" required>
        </div>

        <!-- Student Type -->
        <div>
            <label for="student_type" class="block text-gray-700 font-medium">Student Type</label>
            <select name="student_type" id="student_type" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" required>
                <option value="" disabled {{ old('student_type') ? '' : 'selected' }}>Select student type</option>
                <option value="undergraduate" {{ old('student_type') === 'undergraduate' ? 'selected' : '' }}>Undergraduate</option>
                <option value="graduate" {{ old('student_type') === 'graduate' ? 'selected' : '' }}>Graduate</option>
            </select>
        </div>

        <!-- Gender -->
        <div>
            <label for="gender" class="block text-gray-700 font-medium">Gender</label>
            <select name="gender" id="gender" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" required>
                <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select</option>
                <option value="Male" {{ old('gender') === 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender') === 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('admin.students.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Back
            </a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Save Student
            </button>
        </div>
    </form>
</div>

@endsection
