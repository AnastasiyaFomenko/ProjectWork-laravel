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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('publishing_years.update', ['publishing_year' => $publishingYear->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="year"><b>Название:</b></label><br> <br>
                            <input type="text" placeholder="Название" name="year"
                                class=" @error('year') is-invalid @enderror" id="year" value="{{ $publishingYear->year  }}">
                            <input type="submit" value="Изменить" class="margin-top-20">
                        </div>
                    </form>
                    <div class="right"><a href="{{ route('publishing_years.show',  ['publishing_year' => $publishingYear->id]) }}">Назад</a></div>
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection