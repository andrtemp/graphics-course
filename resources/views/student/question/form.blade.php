@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('student.question.store') }}">
            @csrf
            <div class="form-group">
                <label for="question">{{ __('Question text')  }}</label>
                <textarea name="question" type="text" class="form-control" id="question"
                          placeholder="{{ __('Enter question') }}" required></textarea>
            </div>

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