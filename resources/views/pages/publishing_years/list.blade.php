@extends('layouts.app')
@section('title')
Год издания
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center">Год издания</h3>
        </div>
        <div class="row">
            <div class="col-2 col-md-3"></div>
            <div class="col-8 col-md-6 background-lilac-52">
                <div class="center">
                    <a href="{{ route('publishing_years.create')}}"><button>Добавить</button></a>
                    @foreach($publishing_years as $publishingYear)
                        <a href="{{ route('publishing_years.show', ['publishing_year' => $publishingYear->id]) }}"
                            class="text-primary d-block">{{ $publishingYear->year }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection