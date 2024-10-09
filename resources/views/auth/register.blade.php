@extends('layouts.app')
@section('title')
Регистрация
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h1 class="center">Регистрация</h1>
        </div>
        <div class="row">
            <div class="col-2 col-md-3"></div>
            <div class="col-8 col-md-6 background-lilac-52">
                <div class="center">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <x-input-label for="name" :value="__('Имя')" />
                        <x-text-input id="name" type="text" name="name" required />
                        <x-input-error :messages="$errors->get('name')" />

                        <x-input-label for="surname" :value="__('Фамилия')" />
                        <x-text-input id="surname" type="text" name="surname" required  />
                        <x-input-error :messages="$errors->get('surname')" />

                        <x-input-label for="email" :value="__('Почта')" />
                        <x-text-input id="email" type="email" name="email" required />
                        <x-input-error :messages="$errors->get('email')" />

                        <x-input-label for="login" :value="__(key: 'Логин')" />
                        <x-text-input id="login" type="text" name="login" required />
                        <x-input-error :messages="$errors->get('login')" />

                        <x-input-label for="password" :value="__('Пароль')" />
                        <x-text-input id="password" type="password" name="password" required />
                        <x-input-error :messages="$errors->get('password')" />

                        <x-input-label for="password_confirmation" :value="__('Повтор пароля')" />
                        <x-text-input id="password_confirmation" type="password" name="password_confirmation" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" /><br>

                        <x-text-input id="role_id" type="hidden" name="role_id" :value="__(1)" />

                        <x-primary-button>
                            {{ __('Регистрация') }}
                        </x-primary-button>
                    </form>
                    <div class="font-size-12 margin-top-10">Есть аккаунт? <a href="/login">Войдите!</a></div>
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection