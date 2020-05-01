@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('lessons.store') }}">
            @csrf
            <div class="form-group">
                <label for="topic">{{ __('Topic') }}</label>
                <input name="topic" type="text" class="form-control" id="topic" placeholder="{{ __('Enter topic') }}">
            </div>

            <div class="form-group">
                <label for="video">{{ __('Video') }}</label>
                <input name="video" type="text" class="form-control" id="video" placeholder="{{ __('Enter video') }}">
            </div>

            <div class="form-group">
                <label for="description">{{ __('Description') }}</label>
                <textarea name="description" class="form-control" id="description" placeholder="{{ __('Enter description') }}">

                </textarea>
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