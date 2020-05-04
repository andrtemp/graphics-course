@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Task') }}</th>
                <th>{{ __('Author') }}</th>
                <th>{{ __('Status') }}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->task->text }}</td>
                    <td>{{ $task->author->name }}</td>
                    <td class="{{ $task->mark ? 'table-success' : 'table-danger' }}">
                        {{ $task->mark ? __('Checked') : __('Need review') }}
                    </td>
                    <td>
                        @if(is_null($task->mark))
                            <a class="btn btn-info"
                               href="{{ route('teacher.tasks.show',  $task->id) }}">{{ __('Review') }}</a>
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