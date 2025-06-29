@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded shadow mt-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Instructor</h2>

    {{-- Show validation errors --}}
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

    {{-- Show success message --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.instructors.update', $instructor->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div>
            <label for="name" class="block text-gray-700 font-semibold">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $instructor->name) }}" required
                   class="w-full mt-1 px-4 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-gray-700 font-semibold">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $instructor->email) }}" required
                   class="w-full mt-1 px-4 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <!-- Department -->
        <div>
            <label for="department" class="block text-gray-700 font-semibold">Department</label>
            <input type="text" name="department" id="department" value="{{ old('department', $instructor->department) }}" required
                   class="w-full mt-1 px-4 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <!-- Buttons -->
        <div class="flex justify-between items-center">
            <a href="{{ route('admin.instructors.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition">Back</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded transition">Update Instructor</button>
        </div>
    </form>
</div>
@endsection
