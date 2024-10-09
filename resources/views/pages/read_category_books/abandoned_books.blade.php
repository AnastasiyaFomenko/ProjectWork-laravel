@extends('layouts.app')
@section('title')
Брошено
@endsection
@section('content')
<main>
    @include('components.cabinet')
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