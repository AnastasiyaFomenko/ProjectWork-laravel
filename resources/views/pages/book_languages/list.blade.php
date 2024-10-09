@extends('layouts.app')
@section('title')
Языки переводы
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center">Языки переводы</h3>
        </div>
        <div class="row">
            <div class="col-2 col-md-3"></div>
            <div class="col-8 col-md-6 background-lilac-52">
                <div class="center">
                    <a href="{{ route('book_languages.create')}}"><button>Добавить</button></a>
                    @foreach($languages as $language)
                        <a href="{{ route('book_languages.show', ['book_language' => $language->id]) }}"
                            class="text-primary d-block">{{ $language->language }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection