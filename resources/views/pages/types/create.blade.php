@extends('layouts.app')
@section('title')
Типы
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center">Типы</h3>
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
                    <form action="{{ route('types.store') }}" method="post">
                        @csrf
                        <div>
                            <label for="type"><b>Название:</b></label><br>
                            <input type="text" placeholder="Название" name="type"
                                class=" @error('type') is-invalid @enderror" id="type">
                            <input type="submit" value="Добавить" class="margin-top-20">
                        </div>
                    </form>
                    <div class="right"><a href="{{ route('types.index') }}">Назад</a></div>
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection