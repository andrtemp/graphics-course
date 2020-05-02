@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Task') }}</th>
                <th>{{ __('Mark') }}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->text }}</td>
                    <td>
                        @if(!is_null($task->mark))
                            {{ $task->mark->mark ?? __('On review') }}
                        @endif
                    </td>
                    <td>
                        @if(is_null($task->mark))
                            <a class="btn btn-info"
                               href="{{ route('student.task.form',  $task->id) }}">{{ __('Do') }}</a>
                        @else
                            <span class="btn btn-success">&#x2713</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection