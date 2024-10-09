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
                        <form action="{{ route('authors.update', ['author' => $author->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <x-input-label for="name" :value="__('Имя')" />
                            <x-text-input id="name" type="text" name="name" required autofocus value="{{ $author->name  }}"/>
                            <x-input-error :messages="$errors->get('name')" />

                            <x-input-label for="surname" :value="__('Фамилия')" />
                            <x-text-input id="surname" type="text" name="surname" value="{{ $author->surname  }}"/>
                            <x-input-error :messages="$errors->get('surname')" />

                            <x-input-label for="patronymic" :value="__('Отчество')" />
                            <x-text-input id="patronymic" type="text" name="patronymic" value="{{ $author->patronymic  }}"/>
                            <x-input-error :messages="$errors->get('patronymic')" />

                            <x-input-label for="biography" :value="__('Биография')" />
                            <textarea id="biography" name="biography">{{ $author->biography  }}</textarea>
                            <x-input-error :messages="$errors->get('biography')" />

                            <x-input-label for="birth" :value="__('День рождения')" />
                            <x-text-input id="birth" type="date" name="birth" value="{{ $author->birth  }}"/>
                            <x-input-error :messages="$errors->get('birth')" />

                            <x-input-label for="place_birth" :value="__('Место рождения')" />
                            <x-text-input id="place_birth" type="text" name="place_birth" value="{{ $author->place_birth  }}"/>
                            <x-input-error :messages="$errors->get('place_birth')" />

                            <x-input-label for="cover" :value="__('Аватар автора')" />
                            <x-text-input id="cover" type="file" name="cover" />
                            <x-input-error :messages="$errors->get('cover')" />

                            <x-primary-button>
                                {{ __('Изменить автора') }}
                            </x-primary-button>
                        </form>
                        <div class="right"><a href="{{ route('authors.index') }}">Назад</a></div>
                    </div>
                </div>
                <div class="col-2 col-md-3"></div>
            </div>
        @endif
        @if(Auth::user()->role_id == 1)
            <div class="background-lilac-52">
                <h1><a href="{{ route('authors.index')}}">Дорогой пользователь, вернитесь назад!</a></h1>
            </div>
        @endif
    </div>
</main>
@endsection