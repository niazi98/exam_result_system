@extends('layout')

@section('content')
    <h2>Result Details</h2>
    <p><strong>Student:</strong> {{ $result->student->name }}</p>
    <p><strong>Exam:</strong> {{ $result->exam->title }}</p>
    <p><strong>Marks:</strong> {{ $result->marks }}</p>
@endsection
