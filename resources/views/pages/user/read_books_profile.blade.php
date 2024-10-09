@extends('layouts.app')
@section('title')
Читаю сейчас
@endsection
@section('content')
<main>
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
                <ul class="cards">
                    @foreach($books as $book)
                        <div class="padding-20">
                            <li>
                                <a href="{{ route('books.show', ['book' => $book->id]) }}" class="card ">
                                    <img src="{{env('URL')}}{{$book->cover}}" class="card__image" alt="" />
                                    <div class="card__overlay">
                                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                            <path />
                                        </svg>
                                        <div class="card__description">
                                            <div class="padding-top-10">{{ $book->name}}</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</main>
@endsection