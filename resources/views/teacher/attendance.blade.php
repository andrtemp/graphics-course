@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Total') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->mark }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection