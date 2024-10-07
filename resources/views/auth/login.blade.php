@extends('layouts.app')
@section('title')
Авторизация
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h1 class="center">Авторизация</h1>
        </div>
        <div class="row">
            <div class="col-2 col-md-3"></div>
            <div class="col-8 col-md-6 background-lilac-52">
                <div class="center">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" type="email" name="email" required autofocus />
                        <x-input-error :messages="$errors->get('email')" />

                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" type="password" name="password" required />
                        <x-input-error :messages="$errors->get('password')" />

                        <x-primary-button>
                            {{ __('Авторизация') }}
                        </x-primary-button>

                    </form>

                    <div class="font-size-12 margin-top-10">Нет аккаунта? <a href="/register">Заркгистрируйтесь!</a></div>
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection