@extends('layouts.app')
@section('title')
Издательства
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center">Издательства</h3>
        </div>
        <div class="row">
            <div class="col-2 col-md-3"></div>
            <div class="col-8 col-md-6 background-lilac-52">
                <div class="center">
                    <a href="{{ route('publishing_houses.create')}}"><button>Добавить</button></a>
                    @foreach($publishing_houses as $publishingHouse)
                        <a href="{{ route('publishing_houses.show', ['publishing_house' => $publishingHouse->id]) }}"
                            class="text-primary d-block">{{ $publishingHouse->house }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection