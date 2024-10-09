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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('age_limits.update', ['age_limit' => $ageLimit->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="age"><b>Название:</b></label><br> <br>
                            <input type="text" placeholder="Название" name="age"
                                class=" @error('age') is-invalid @enderror" id="age" value="{{ $ageLimit->age }}">
                            <input type="submit" value="Изменить" class="margin-top-20">
                        </div>
                    </form>
                    <div class="right"><a href="{{ route('age_limits.show',  ['age_limit' => $ageLimit->id]) }}">Назад</a></div>
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection