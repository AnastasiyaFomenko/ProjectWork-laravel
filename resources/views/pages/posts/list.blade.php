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
                <div class="background-lilac-52">
                    <h2>На обработке:</h2>
                </div>
                @foreach($posts as $post)
                    @if ($post->moderation_status_id == '1')
                        <div class="padding-20">
                            <h4>{{$post->user->name}}</h4>
                            <h2>{{$post->name}}</h2>
                            <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                                class="text-primary d-block">Подробнее</a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="row margin-top-20">
            <div class="col-12 col-md-12">
                <div class="background-lilac-52">
                    <h2>Опубликовано:</h2>
                </div>
                @foreach($posts as $post)
                    @if ($post->moderation_status_id == '2')
                        <div class="padding-20">
                            <h4>{{$post->user->name}}</h4>
                            <h2>{{$post->name}}</h2>
                            <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                                class="text-primary d-block">Подробнее</a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="row margin-top-20">
            <div class="col-12 col-md-12">
                <div class="background-lilac-52">
                    <h2>Отклонено:</h2>
                </div>
                @foreach($posts as $post)
                    @if ($post->moderation_status_id == '3')
                        <div class="padding-20">
                            <h4>{{$post->user->name}}</h4>
                            <h2>{{$post->name}}</h2>
                            <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                                class="text-primary d-block">Подробнее</a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection