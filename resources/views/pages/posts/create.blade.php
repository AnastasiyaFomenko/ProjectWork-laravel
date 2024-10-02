@extends('layouts.app')
@section('title')
Предложить статью
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center">Предложить статью</h3>
        </div>
        <div class="row">
            <div class="col-2 col-md-3"></div>
            <div class="col-8 col-md-6 background-lilac-52">
                <div class="center">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="name"><b>Название:</b></label><br>
                            <input type="text" placeholder="Название" name="name"
                                class=" @error('name') is-invalid @enderror" id="name"><br>

                            <label for="text"></label><b>Текcт:</b></label><br>
                                <textarea id="text" name="text"></textarea><br>
                            <label for="cover"><b>Фотография:</b></label><br>
                            <input type="file" class="margin-top-20" name="cover"
                                class=" @error('cover') is-invalid @enderror" id="cover"><br>
                            <input type="submit" value="Добавить" class="margin-top-20">
                            <input type = "hidden" name="user_id" id="user_id" value="1">
                        </div>
                    </form>
                    <div class="right"><a href="{{ route('posts.index') }}">Назад</a></div>
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection