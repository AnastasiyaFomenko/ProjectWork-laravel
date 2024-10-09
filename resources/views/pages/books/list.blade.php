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
                @auth
                    @if(Auth::user()->role_id == 2)
                        <div class="background-lilac-52">
                            <h2>Книги</h2>
                            <a href="{{ route('books.create')}}"><button>Добавить</button></a>
                        </div>
                    @endif
                @endauth
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
                                            <div class="padding-top-10">{{ $book->name->name}}</div>
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