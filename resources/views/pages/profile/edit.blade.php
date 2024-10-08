@extends('layouts.app')
@section('title')
Редактирование профиля
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center">Редактирование профиля</h3>
        </div>
        <div class="row">
            <div class="col-2 col-md-3"></div>
            <div class="col-8 col-md-6 background-lilac-52">
                <div class="center">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('profile.update', ['profile' => Auth::user()->id ]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-input-label for="surname" :value="__('Фамилия')" />
                        <x-text-input id="surname" type="text" name="surname" required autofocus value="{{ Auth::user()->surname }}" />
                        <x-input-error :messages="$errors->get('surname')" />

                        <x-input-label for="name" :value="__('Имя')" />
                        <x-text-input id="name" type="text" name="name" required value="{{ Auth::user()->name }}"/>
                        <x-input-error :messages="$errors->get('name')" />

                        <x-input-label for="birth" :value="__('Дата рождения')" />
                        <x-text-input id="birth" type="date" name="birth" required value="{{ Auth::user()->birth  }}"/>
                        <x-input-error :messages="$errors->get('birth')" />

                        <x-input-label for="experiens" :value="__('Стаж')" />
                        <x-text-input id="experiens" type="text" name="experiens" required value="{{ Auth::user()->experiens  }}"/>
                        <x-input-error :messages="$errors->get('experiens')" />

                        <x-input-label for="about_user" :value="__('О себе')" />
                        <textarea id="about_user" name="about_user">{{ Auth::user()->about_user  }}</textarea>
                        <x-input-error :messages="$errors->get('about_user')" />

                        <x-input-label for="avatar" :value="__('Фотография профиля')" />
                        <x-text-input id="avatar" type="file" name="avatar" />
                        <x-input-error :messages="$errors->get('avatar')" />

                        
                        <x-primary-button>
                            {{ __('Изменить') }}
                        </x-primary-button>
                    </form>
                    <div class="right"><a href="{{ route('profile.show', ['profile' => Auth::user()->id])}}">Назад</a></div>
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection