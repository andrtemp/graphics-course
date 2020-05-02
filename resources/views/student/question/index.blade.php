@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a class="btn btn-primary mb-3" href="{{ route('student.question.form') }}">
                {{ __('Ask question') }}
            </a>
        </div>
        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <td>{{ __('ID') }}</td>
                <td>{{ __('Question') }}</td>
                <td>{{ __('Answer') }}</td>
            </tr>
            </thead>
            <tbody>
            @foreach($questions as $question)
                <tr class="{{ is_null($question->answer) ? 'table-warning' : 'table-success'  }}">
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->question }}</td>
                    <td>{{ $question->answer }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection