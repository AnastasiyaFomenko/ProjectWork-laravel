@extends('layouts.app')
@section('title')
Добавить рецензию
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
            <div class="row">
                <h3 class="center">Добавить рецензию</h3>
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
                        <form action="{{ route('books.store_review', ['book' => $book->id]) }}" method="post">
                            @csrf
                        
                            <x-input-label for="name" :value="__('Название статьи')" />
                            <x-text-input id="name" type="text" name="name" required />
                            <x-input-error :messages="$errors->get('name')" />


                            <x-input-label for="text" :value="__('Текст статьи')" />
                            <textarea id="text" type="text" name="text" required></textarea>
                            <x-input-error :messages="$errors->get('text')" />                            

                            <x-primary-button>
                                {{ __('Добавить рецензию') }}
                            </x-primary-button>
                        </form>
                        <div class="right"><a href="{{ route('books.index') }}">Назад</a></div>
                    </div>
                </div>
                <div class="col-2 col-md-3"></div>
            </div>
    </div>
</main>
@endsection