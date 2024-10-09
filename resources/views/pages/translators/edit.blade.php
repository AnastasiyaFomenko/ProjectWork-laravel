@extends('layouts.app')
@section('title')
Изменение автора
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        @if(Auth::user()->role_id == 2)
            <div class="row">
                <h3 class="center">Автор</h3>
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
                        <form action="{{ route('translators.update', ['translator' => $translator->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <x-input-label for="name" :value="__('Имя')" />
                            <x-text-input id="name" type="text" name="name" required autofocus value="{{ $translator->name }}"/>
                            <x-input-error :messages="$errors->get('name')" />

                            <x-input-label for="surname" :value="__('Фамилия')" />
                            <x-text-input id="surname" type="text" name="surname" value="{{ $translator->surname  }}"/>
                            <x-input-error :messages="$errors->get('surname')" />

                            <x-input-label for="patronymic" :value="__('Отчество')" />
                            <x-text-input id="patronymic" type="text" name="patronymic" value="{{ $translator->patronymic  }}"/>
                            <x-input-error :messages="$errors->get('patronymic')" />

                            <x-primary-button>
                                {{ __('Изменить переводчика') }}
                            </x-primary-button>
                        </form>
                        <div class="right"><a href="{{ route('translators.index') }}">Назад</a></div>
                    </div>
                </div>
                <div class="col-2 col-md-3"></div>
            </div>
        @endif
        @if(Auth::user()->role_id == 1)
            <div class="background-lilac-52">
                <h1><a href="{{ route('translators.index')}}">Дорогой пользователь, вернитесь назад!</a></h1>
            </div>
        @endif
    </div>
</main>
@endsection