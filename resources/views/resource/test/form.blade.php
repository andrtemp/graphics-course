@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('test.store', $lesson_id) }}">
            @csrf
            <div class="form-group">
                <label for="question">{{ __('Question') }}</label>
                <input name="question" type="text" class="form-control" id="question" placeholder="{{ __('Enter question') }}">
            </div>

            <div class="form-group">
                <label for="answer">{{ __('Answer') }}</label>
                <input name="answer" type="text" class="form-control" id="answer" placeholder="{{ __('Enter answer') }}">
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