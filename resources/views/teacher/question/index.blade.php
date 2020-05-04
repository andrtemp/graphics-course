@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Question') }}</th>
                <th>{{ __('Author') }}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->question }}</td>
                    <td>{{ $question->author->name }}</td>
                    <td>
                        @if($question->answer)
                            <span class="btn btn-success">&#x2713</span>
                        @else
                            <a class="btn btn-info"
                                href="{{ route('teacher.questions.show',  $question->id) }}">{{ __('Answer') }}</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection