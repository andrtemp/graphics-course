@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a class="btn btn-primary mb-3" href="{{ route('test.create', $lesson->id) }}">
                {{ __('Create Test') }}
            </a>
        </div>
        <h2 class="text-center">
            {{ $lesson->topic }}
        </h2>
        <div class="text-center">
            @include('components.video', ['url' => $lesson->video])
        </div>
        <div class="jumbotron">
            {!! $lesson->description !!}
        </div>

        @if(!empty($lesson->questions))
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Question') }}</th>
                    <th>{{ __('Answer') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($lesson->questions as $question)
                    <tr>
                        <td>{{ $question->id }}</td>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->answer }}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <form action="{{ route('test.destroy', $question->id) }}" method="POST">
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
        @endif
    </div>
@endsection