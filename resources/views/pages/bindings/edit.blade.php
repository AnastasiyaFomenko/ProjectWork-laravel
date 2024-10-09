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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('bindings.update', ['binding' => $binding->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="binding"><b>Название:</b></label><br> <br>
                            <input type="text" placeholder="Название" name="binding"
                                class=" @error('binding') is-invalid @enderror" id="binding" value="{{ $binding->binding  }}">
                            <input type="submit" value="Изменить" class="margin-top-20">
                        </div>
                    </form>
                    <div class="right"><a href="{{ route('bindings.show',  ['binding' => $binding->id]) }}">Назад</a></div>
                </div>
            </div>
            <div class="col-2 col-md-3"></div>
        </div>
    </div>
</main>
@endsection