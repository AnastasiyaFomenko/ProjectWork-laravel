@extends('layouts.app')
@section('title')
Добавить переводчика
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        @if(Auth::user()->role_id == 2)
            <div class="row">
                <h3 class="center">Добавить тег</h3>
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
                        <form action="{{ route('books.store_translator', ['book' => $book->id]) }}" method="post">
                            @csrf
                        
                            <x-input-label for="translator_id" :value="__('Id переводчика')" />
                            <x-text-input id="translator_id" type="text" name="translator_id" required />
                            <x-input-error :messages="$errors->get('translator_id')" />

                            <x-primary-button>
                                {{ __('Добавить переводчика') }}
                            </x-primary-button>
                        </form>
                        <div class="right"><a href="{{ route('books.index') }}">Назад</a></div>
                    </div>
                </div>
                <div class="col-2 col-md-3"></div>
            </div>
        @endif
        @if(Auth::user()->role_id == 1)
            <div class="background-lilac-52">
                <h1><a href="{{ route('books.index')}}">Дорогой пользователь, вернитесь назад!</a></h1>
            </div>
        @endif
    </div>
</main>
@endsection