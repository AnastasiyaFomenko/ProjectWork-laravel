@extends('layouts.app')
@section('title')
Посты
@endsection
@section('content')
@auth
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center"></h3>
        </div>
        @if(Auth::user()->role_id == 2)
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="background-lilac-52">
                    <h2>На обработке:</h2>
                </div>
                @foreach($posts as $post)
                    @if ($post->moderation_status_id == '1')
                        <div class="padding-20">
                            <div class="row background-lilac-52">
                                <div class="col-6">
                                    <div>
                                        <b>Обложка: </b>
                                        <img src="{{env('URL')}}{{$post->cover}}" class="little-image">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <b>Пользователь: </b>
                                    <a href="/user_profile/{{$post->user->id}}"><h2>{{$post->user->login}}</h2></a>
                                    <b>Название статьи: </b>
                                    <h5>{{$post->name}}</h5>
                                    <br>
                                    <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                                        class="text-primary d-block">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        @endif
        @endauth
        <div class="row margin-top-20">
            <div class="col-12 col-md-12">
                @auth
                @if(Auth::user()->role_id == 2)
                <div class="background-lilac-52">
                    <h2>Опубликовано:</h2>
                </div>
                @endif
                @endauth
                @foreach($posts as $post)
                    @if ($post->moderation_status_id == '2')
                        <div class="padding-20">
                            <div class="row background-lilac-52">
                                <div class="col-6">
                                    <div>
                                        <b>Обложка: </b>
                                        <img src="{{env('URL')}}{{$post->cover}}" class="little-image">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <b>Пользователь: </b>
                                    <a href="/user_profile/{{$post->user->id}}"><h2>{{$post->user->login}}</h2></a>
                                    <b>Название статьи: </b>
                                    <h5>{{$post->name}}</h5>
                                    <br>
                                    <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                                        class="text-primary d-block">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        @auth
        @if(Auth::user()->role_id == 2)
        <div class="row margin-top-20">
            <div class="col-12 col-md-12">
                <div class="background-lilac-52">
                    <h2>Отклонено:</h2>
                </div>
                @foreach($posts as $post)
                    @if ($post->moderation_status_id == '3')
                        <div class="padding-20">
                            <div class="row background-lilac-52">
                                <div class="col-6">
                                    <div>
                                        <b>Обложка: </b>
                                        <img src="{{env('URL')}}{{$post->cover}}" class="little-image">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <b>Пользователь: </b>
                                    <a href="/user_profile/{{$post->user->id}}"><h2>{{$post->user->login}}</h2></a>
                                    <b>Название статьи: </b>
                                    <h5>{{$post->name}}</h5>
                                    <br>
                                    <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                                        class="text-primary d-block">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        @endif
        @endauth
    </div>
    
</main>
@endsection