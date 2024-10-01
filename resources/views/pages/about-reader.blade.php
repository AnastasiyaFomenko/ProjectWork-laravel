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
                    <p>Фамилия: Фамилияsss</p>
                    <p>Имя: Имя</p>
                    <p>Дата рождения: Дата рождения</p>
                    <p>Дата регистрации: Дата регистрации</p>
                </div>
                <div class="col-6">
                    <p>Стаж: Стаж</p>
                </div>
            </div>
            <div class="row margin-top-20">
                <div class="col-12">
                    <h4>О себе</h4>
                </div>
            </div>
            <div class="row margin-top-20 background-lilac-52">
                <div class="col-12">
                    <form method="post">
                        @csrf
                        <textarea name="about" value="О себе"></textarea>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection