@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('teacher.questions.answer', $question->id) }}">
            @csrf
            <div class="form-group">
                <label for="answer">
                    {{ $question->question  }}
                    <i class="blockquote-footer">{{ $question->author->name }}</i>
                </label>
                <textarea name="answer" type="text" class="form-control" id="answer"
                          placeholder="{{ __('Enter answer') }}" required></textarea>
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