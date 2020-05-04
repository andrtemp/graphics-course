@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('teacher.tasks.mark', $task->id) }}">
            @csrf
            <h3>{{ $task->author->name }}</h3>
            <i class="text-justify">{{ $task->task->text }}</i>
            <div class="form-group">
                <label for="mark">{{ $task->answer  }}</label>
                <input name="mark" type="number" class="form-control" id="mark"
                          placeholder="{{ __('Enter mark') }}" required/>
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