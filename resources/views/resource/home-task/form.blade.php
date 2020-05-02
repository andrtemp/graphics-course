@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('home-tasks.store') }}">
            @csrf
            <div class="form-group">
                <label for="lesson">{{ __('Lesson') }}</label>
                <select name="lesson_id" type="text" class="form-control" id="lesson">
                    @foreach($lessons as $lesson)
                        <option value="{{ $lesson->id }}">{{ $lesson->id . '. ' . $lesson->topic }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="text">{{ __('Text') }}</label>
                <textarea name="text" class="form-control" id="text" placeholder="{{ __('Enter task text') }}"></textarea>
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