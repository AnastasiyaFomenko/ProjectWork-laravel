@extends('layouts.app')
@section('title')
Название литературы
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center">Название литературы</h3>
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
                    <form action="{{ route('name_books.store') }}" method="post">
                        @csrf
                        <div>
                            <label for="name"><b>Название:</b></label><br>
                            <input type="text" placeholder="Название" name="name"
                                class=" @error('name') is-invalid @enderror" id="name">
                            <input type="submit" value="Добавить" class="margin-top-20">
                        </div>
                    </form>
                    <div class="right"><a href="{{ route('name_books.index') }}">Назад</a></div>
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection