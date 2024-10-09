@extends('layouts.app')
@section('title')
Переплет
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center">Переплет</h3>
        </div>
        <div class="row">
            <div class="col-2 col-md-3"></div>
            <div class="col-8 col-md-6 background-lilac-52">
                <div class="center">
                    <a href="{{ route('bindings.create')}}"><button>Добавить</button></a>
                    @foreach($bindings as $bindingBook)
                        <a href="{{ route('bindings.show', ['binding' => $bindingBook->id]) }}"
                            class="text-primary d-block">{{ $bindingBook->binding }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection