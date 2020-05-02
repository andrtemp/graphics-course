@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('Test for lesson') . ' ' . $id  }}</h2>
        <form method="POST" action="{{ route('student.test.store', $id) }}">
            @csrf
            @foreach($questions as $question)
                <div class="form-group">
                    <label>{{ $question->question  }}</label>
                    <input name="answers[{{ $question->id }}]" type="text" class="form-control" placeholder="{{ __('Enter answer') }}" required>
                </div>
            @endforeach

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ __('Save') }}
                </button>
                <button class="btn btn-danger" type="reset">
                    {{ __('Reset') }}
                </button>
            </div>
        </form>
    </div>
@endsection