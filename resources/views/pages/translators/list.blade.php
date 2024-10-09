@extends('layouts.app')
@section('title')
Переводчики
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
                @if(Auth::user()->role_id == 2)
                    <div class="background-lilac-52">
                        <h2>Переводчики</h2>
                        <a href="{{ route('translators.create')}}"><button>Добавить</button></a>
                    </div>
                @endif
                    @foreach($translators as $translator)
                        <div class="padding-20">
                                <b>Имя: </b>
                                <h5>{{$translator->name}}</h5>
                                <b>Фамилия </b>
                                <h5>{{$translator->surname}}</h5>
                                <b>Отчество </b>
                                <h5>{{$translator->patronymic}}</h5>
                                @if(Auth::user()->role_id == 2)
                                <a href="{{ route('translators.show', ['translator' => $translator->id]) }}">Подробнее</a>
                                @endif
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
</main>
@endsection