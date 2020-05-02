@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">
            {{ $lesson->topic }}
        </h2>
        <div class="text-center">
            @include('components.video', ['url' => $lesson->video])
        </div>
        <div class="jumbotron">
            {!! $lesson->description !!}
        </div>

        <div class="row float-right">
            <a class="btn btn-primary mb-3" href="{{ route('student.test.form', $lesson->id) }}">
                {{ __('Pass Test') }}
            </a>
        </div>
    </div>
@endsection