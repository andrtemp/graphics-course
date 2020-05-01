@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <blockquote class="blockquote text-right">
                <p class="mb-0">{{ __('Aim for success, not perfection. Never give up your right to be wrong, because then you will lose the ability to learn new things and move forward with your life. Remember that fear always lurks behind perfectionism.') }}</p>
                <footer class="blockquote-footer"><cite title="Source Title">David M. Burns</cite></footer>
            </blockquote>
        </div>
        <h1 class="display-4 text-center">{{ __('Get your goals with this course') }}</h1>
        <div class="main-items mt-5">
            <span class="main-items__element">
                <span class="element__image">
                    <img class="element__image_full" src="{{ asset('img/head.png') }}" alt="">
                </span>
                <span class="element__header">
                    {{ __('Get relevant skills') }}
                </span>
                <span class="element__text">
                    {{ __('') }}
                </span>
            </span>
            <span class="main-items__element">
                <span class="element__image">
                    <img class="element__image_full" src="{{ asset('img/board.png') }}" alt="">
                </span>
                    <span class="element__header">
                    {{ __('Get the skills you need to work') }}
                </span>
                <span class="element__text">
                    {{ __('') }}
                </span>
            </span>
            <span class="main-items__element">
                <span class="element__image">
                    <img class="element__image_full" src="{{ asset('img/certificate.png') }}" alt="">
                </span>
                <span class="element__header">
                    {{ __('Get a certificate or diploma') }}
                </span>
                <span class="element__text">
                    {{ __('') }}
                </span>
            </span>
            <span class="main-items__element">
                <span class="element__image">
                    <img class="element__image_full" src="{{ asset('img/people.png') }}" alt="">
                </span>
                <span class="element__header">
                    {{ __('Grow your organization') }}
                </span>
                <span class="element__text">
                    {{ __('') }}
                </span>
            </span>
        </div>
    </div>
@endsection
