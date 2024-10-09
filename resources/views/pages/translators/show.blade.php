@extends('layouts.app')
@section('title')
Переводчик
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center"></h3>
        </div>
        <div class="row">
            <div class="col-12">
                <div>
                    <b>Имя: </b>
                    <h5>{{$translator->name}}</h5>
                    <b>Фамилия </b>
                    <h5>{{$translator->surname}}</h5>
                    <b>Отчество </b>
                    <h5>{{$translator->patronymic}}</h5>
                </div>
            </div>
        </div>
        @if(Auth::user()->role_id == 2)
            <div class="row margin-top-50">
                <div class="col-4">
                    <a href="{{ route('translators.edit', ['translator' => $translator->id]) }}"
                        class="text-primary d-block"><button>Изменить</button></a>
                </div>
            </div>
            <div class="row margin-top-20">
                <div class="col-4">
                <form action="{{ route('translators.destroy', ['translator' => $translator->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Удалить"
                                onclick="return confirm('Вы действительно хотите удалить запись?')">
                        </form>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="right"><a href="{{ route('authors.index') }}">Назад</a></div>
            </div>
        </div>
    </div>
</main>
@endsection