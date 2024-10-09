@extends('layouts.app')
@section('title')
Жанры
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center">Жанры</h3>
        </div>
        <div class="row">
            <div class="col-2 col-md-3"></div>
            <div class="col-8 col-md-6 background-lilac-52">
                <div class="center">
                    <a href="{{ route('genres.create')}}"><button>Добавить</button></a>
                    @foreach($genres as $genreBook)
                        <a href="{{ route('genres.show', ['genre' => $genreBook->id]) }}"
                            class="text-primary d-block">{{ $genreBook->genre }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection