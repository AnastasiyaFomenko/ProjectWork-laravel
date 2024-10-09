@extends('layouts.app')
@section('title')
Аннотация
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center">Аннотация</h3>
        </div>
        <div class="row">
            <div class="col-2 col-md-3"></div>
            <div class="col-8 col-md-6 background-lilac-52">
                <div class="center">
                    <a href="{{ route('annotations.create')}}"><button>Добавить</button></a>
                    @foreach($annotations as $annotationBook)
                        <a href="{{ route('annotations.show', ['annotation' => $annotationBook->id]) }}"
                            class="text-primary d-block">{{ $annotationBook->annotation }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection