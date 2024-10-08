@extends('layouts.app')
@section('title')
Название литературы
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center"></h3>
        </div>
        <div class="row">
            <div class="col-12 col-md-12">
                <div>
                    <b>Название: </b>
                    <h2>{{$book->name->name}}</h2>
                    <b>Возрастное ограничение: </b>
                    <h5>{{ $book->age->age }}</h5>
                    <b>Аннотация: </b>
                    <h5>{{ $book->annotation->annotation }}</h5>
                    <b>Год издания: </b>
                    <h5>{{ $book->year->year }}</h5>
                    <b>Издательство: </b>
                    <h5>{{ $book->house->house }}</h5>
                    <b>Язык: </b>
                    <h5>{{ $book->language->language }}</h5>
                    <b>Обложка: </b>
                    <h5>{{ $book->binding->binding }}</h5>
                    <b>Тип: </b>
                    <h5>{{ $book->type->type }}</h5>
                    <b>ISBN: </b>
                    <h5>{{ $book->ISBN }}</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a href="{{ route('books.edit', ['book' => $book->id]) }}"
                    class="text-primary d-block"><button>Изменить</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="right"><a href="{{ route('books.index') }}">Назад</a></div>
            </div>
        </div>
    </div>
</main>
@endsection