@extends('layouts.app')
@section('title')
Профиль
@endsection
@section('content')
<main>
<div class="margin-top-50"></div>
<div class="container">
    <div class="row">
        <div class="col-8 col-md-3">
            <img src="{{env('URL')}}{{$user->avatar}}"
                class="circle-image little-image">
        </div>
        <div class="col-4 col-md-9">
            <p>{{$user->name}} {{$user->surname}}</p>
        </div>
    </div>
</div>
<div class="container-fluid background-lilac-52 margin-top-20">
    <div class="row font-size-little">
        <div class="col-12 col-md-1"><a href="{{ route('user.user_profile', ['user' => $user->id])}}">Профиль</a></div>
        <div class="col-12 col-md-2"><a href="{{ route('user.user_read_books', ['user' => $user->id])}}"> Прочитанное</a></div>
        <div class="col-12 col-md-2"><a href="{{ route('user.user_want_read_books', ['user' => $user->id])}}"> Хочу прочитать</a></div>
        <div class="col-12 col-md-1"><a href="{{ route('user.user_abandoned_books', ['user' => $user->id])}}"> Брошено</a></div>
        <div class="col-12 col-md-2"><a href="{{ route('user.user_now_read_books', ['user' => $user->id])}}"> Читаю сейчас</a></div>
        <div class="col-12 col-md-2"><a href="{{ route('user.user_reviews', ['user' => $user->id])}}"> Мои рецензии</a></div>
        <div class="col-12 col-md-1"><a href="{{ route('user.user_posts', ['user' => $user->id])}}"> Мои статьи</a></div>
    </div>
</div>
    <div class="container">
        <div class="row margin-top-20">
            <div class="col-12">
                <h4>Профиль</h4>
            </div>
        </div>
        <div class="row margin-top-20 background-lilac-52">
            <div class="col-6">
                <p>Фамилия: {{$user->surname}}</p>
                <p>Имя: {{$user->name}}</p>
                <p>Дата рождения: {{$user->birth}}</p>
            </div>
            <div class="col-6">
                <p>Стаж:{{$user->experiens}} </p>
            </div>
        </div>
        <div class="row margin-top-20">
            <div class="col-12">
                <h4>О себе</h4>
            </div>
        </div>
        <div class="row margin-top-20 background-lilac-52">
            <div class="col-12">
                {{$user->about_user}}
            </div>
        </div>
    </div>
</main>
@endsection