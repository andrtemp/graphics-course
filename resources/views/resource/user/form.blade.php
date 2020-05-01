@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="{{ __('Enter email') }}">
            </div>

            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="{{ __('Enter name') }}">
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input name="password" type="text" class="form-control" id="password" placeholder="{{ __('Enter password') }}">
            </div>

            <div class="form-group">
                <label for="role">{{ __('Role') }}</label>
                <select name="role" type="text" class="form-control" id="role">
                    <option value="root">root</option>
                    <option value="teacher">teacher</option>
                    <option value="student">student</option>
                </select>
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