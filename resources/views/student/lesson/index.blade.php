@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="lesson">
            @foreach($lessons as $lesson)
                <div class="lesson__item lesson__item_{{ is_null($lesson->mark) ? 'active' : 'passed' }}">
                    <a href="{{ route('student.lesson.view',  $lesson->id) }}">
                        <div class="">
                            <span class="item__main">
                                {{ $lesson->id . '. ' . $lesson->topic }}
                            </span>
                            <span class="item__footer">
                                {{ $lesson->created_at }}
                            </span>
                            <span class="item__mark">
                                @if(!is_null($lesson->mark))
                                    {{ $lesson->mark->mark }}
                                @endif
                            </span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection