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
                    <b>Статус:</b>
                    @if ($post->moderation_status_id == '1')
                    <h5>В обработке</h5>
                    @endif
                    @if ($post->moderation_status_id == '2')
                    <h5>Опубликовано</h5>
                    @endif
                    @if ($post->moderation_status_id == '3')
                    <h6>Отклонено</h6>
                    @endif
                    <b>Автор: </b>
                    <h3>{{$post->user->name}}</h3>
                    <b>Название: </b>
                    <h2>{{$post->name}}</h2>
                    <b>Содержание: </b>
                    <h5>{!! $post->text !!}</h5>
                    <b>Изображение: </b>
                    <h3><img src = "{{env('URL')}}{{$post->cover}}" width = "200"></h3>
                </div>
            </div>
        </div>
        @if ($post->moderation_status_id == '1')
            <div class="row">
                <div class="col-4 col-md-4">
                    <form action="{{ route('posts.update_status', ['post' => $post->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div>
                            <input type="hidden" name="moderation_status_id"
                                class=" @error('moderation_status_id') is-invalid @enderror" id="moderation_status_id"
                                value="2">
                            <input type="submit" value="Одобрено" class="margin-top-20">
                        </div>
                    </form>
                </div>
                <div class="col-4 col-md-4">
                    <form action="{{ route('posts.update_status', ['post' => $post->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div>
                            <input type="hidden" name="moderation_status_id"
                                class=" @error('moderation_status_id') is-invalid @enderror" id="moderation_status_id"
                                value="3">
                            <input type="submit" value="Отказано" class="margin-top-20">
                        </div>
                    </form>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="right"><a href="{{ route('posts.index') }}">Назад</a></div>
            </div>
        </div>
    </div>
</main>
@endsection