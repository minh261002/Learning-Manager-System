@extends('instructor.master')

@section('title', 'Danh sách câu hỏi')

@section('content')
    <div class="dashboard-content-wrap mb-5">
        @dump($questions)
    </div>
@endsection
