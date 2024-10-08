@extends('layouts.app')
@section('title')
Мой профиль
@endsection
@section('content')
<main>
    @include('components.cabinet')
    <div class="container">
        <div class="row margin-top-20">
            <div class="col-12">
                <h4>Мой профиль</h4>
            </div>
        </div>
        <div class="row margin-top-20 background-lilac-52">
            <div class="col-6">
                <p>Фамилия: {{Auth::user()->surname}}</p>
                <p>Имя: {{Auth::user()->name}}</p>
                <p>Дата рождения: {{Auth::user()->birth}}</p>
            </div>
            <div class="col-6">
                <p>Стаж:{{Auth::user()->experiens}} </p>
            </div>
        </div>
        <div class="row margin-top-20">
            <div class="col-12">
                <h4>О себе</h4>
            </div>
        </div>
        <div class="row margin-top-20 background-lilac-52">
            <div class="col-12">
                {{Auth::user()->about_user}}
            </div>
        </div>
        <div class="row margin-top-20">
            <div class="col-12">
                <a href="{{ route('profile.edit', ['profile' => Auth::user()->id]) }}"
                    class="text-primary d-block"><button>Изменить</button></a>
            </div>
        </div>
    </div>
</main>
@endsection