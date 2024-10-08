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
        <div class="col-6">
                <div>
                    <b>Фотография: </b>
                    <img src="{{env('URL')}}{{$author->cover}}" class="little-image">
                </div>
            </div>
            <div class="col-6">
                <div>
                    <b>Имя: </b>
                    <h5>{{$author->name}}</h5>
                    <b>Фамилия </b>
                    <h5>{{$author->surname}}</h5>
                    <b>Отчество </b>
                    <h5>{{$author->patronymic}}</h5>
                    <b>Биография </b>
                    <h5>{{$author->biography}}</h5>
                    <b>День рождения: </b>
                    <h5>{{$author->birth}}</h5>
                    <b>Место рождения: </b>
                    <h5>{{$author->place_birth}}</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="right"><a href="{{ route('authors.index') }}">Назад</a></div>
            </div>
        </div>
    </div>
</main>
@endsection