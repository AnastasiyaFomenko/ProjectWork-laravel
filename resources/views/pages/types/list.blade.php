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
                    <a href="{{ route('types.create')}}"><button>Добавить</button></a>
                    @foreach($types as $typeBook)
                        <a href="{{ route('types.show', ['type' => $typeBook->id]) }}"
                            class="text-primary d-block">{{ $typeBook->type }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection