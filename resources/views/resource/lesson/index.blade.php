@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a class="btn btn-primary mb-3" href="{{ route('lessons.create') }}">
                {{ __('Create Lesson') }}
            </a>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Topic') }}</th>
                <th>{{ __('Video') }}</th>
                <th>{{ __('Created') }}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($lessons as $lesson)
                <tr>
                    <td>{{ $lesson->id }}</td>
                    <td>{{ $lesson->topic }}</td>
                    <td>{{ $lesson->video }}</td>
                    <td>{{ $lesson->created_at }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a  class="btn btn-warning" href="{{ route('lessons.show', $lesson->id) }}">
                                {{ __('View') }}
                            </a>
                            <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">X</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection