@extends('layouts.app')
@section('title')
Рецензии
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center"></h3>
        </div>
                <div class="padding-20">

                    <div class="row background-lilac-52">
                        <div class="col-6">
                            <div>
                                <b>Обложка: </b>
                                <img src="{{env('URL')}}{{$review->cover}}" class="little-image">
                            </div>
                        </div>
                        <div class="col-6">
                            <b>Пользователь: </b>
                            <a href="/user_profile/{{$review->user_id}}"><h2>{{$review->login}}</h2></a>
                            <b>Название рецензии: </b>
                            <h5>{{ $review->name }}</h5>
                            <b>Текст рецензии: </b>
                            <h5>{{ $review->text }}</h5>
                            <br>
                            <a href="{{ route('reviews.index') }}">Назад</a>
                        </div>
                    </div>
                </div>
    </div>
</main>
@endsection