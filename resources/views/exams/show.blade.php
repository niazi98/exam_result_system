@extends('layouts.app')

@section('content')
    <h2>{{ $exam->title }}</h2>
    <p>Course: {{ $exam->course->title }}</p>
    <p>Date: {{ $exam->exam_date }}</p>
@endsection
