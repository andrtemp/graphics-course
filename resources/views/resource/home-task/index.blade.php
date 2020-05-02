@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a class="btn btn-primary mb-3" href="{{ route('home-tasks.create') }}">
                {{ __('Create Home task') }}
            </a>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Lesson') }}</th>
                <th>{{ __('Text') }}</th>
                <th>{{ __('Created') }}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($hometasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->lesson->topic }}</td>
                    <td>{{ $task->text }}</td>
                    <td>{{ $task->created_at }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <form action="{{ route('home-tasks.destroy', $task->id) }}" method="POST">
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