@extends('layouts.app')
@section('title')
Издательства
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center"></h3>
        </div>
        <div class="row">
            <div class="col-2 col-md-3"></div>
            <div class="col-8 col-md-6 background-lilac-52">
                <div class="center">
                    <b>Название: </b>{{ $publishingHouse->house }}
                    <div class="margin-top-20">
                        <form action="{{ route('publishing_houses.destroy', ['publishing_house' => $publishingHouse->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Удалить"
                                onclick="return confirm('Вы действительно хотите удалить запись?')">
                        </form><br>
                        <a href="{{ route('publishing_houses.edit', ['publishing_house' => $publishingHouse->id]) }}"
                            class="text-primary d-block"><button>Изменить</button></a>
                    </div>
                    <div class="right"><a href="{{ route('publishing_houses.index') }}">Назад</a></div>
                </div>
            </div>
        </div>
        <div class="col-2 col-md-3"></div>
    </div>
    </div>
</main>
@endsection