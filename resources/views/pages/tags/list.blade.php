@extends('layouts.app')
@section('title')
Тэг
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center">Тэг</h3>
        </div>
        <div class="row">
            <div class="col-2 col-md-3"></div>
            <div class="col-8 col-md-6 background-lilac-52">
                <div class="center">
                    <a href="{{ route('tags.create')}}"><button>Добавить</button></a>
                    @foreach($tags as $tagBook)
                        <a href="{{ route('tags.show', ['tag' => $tagBook->id]) }}"
                            class="text-primary d-block">{{ $tagBook->tag }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection