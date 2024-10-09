@extends('layouts.app')
@section('title')
Возрастное ограничение
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center">Возрастное ограничение</h3>
        </div>
        <div class="row">
            <div class="col-2 col-md-3"></div>
            <div class="col-8 col-md-6 background-lilac-52">
                <div class="center">
                    <a href="{{ route('age_limits.create')}}"><button>Добавить</button></a>
                    @foreach($age_limits as $ageLimit)
                        <a href="{{ route('age_limits.show', ['age_limit' => $ageLimit->id]) }}"
                            class="text-primary d-block">{{ $ageLimit->age }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection