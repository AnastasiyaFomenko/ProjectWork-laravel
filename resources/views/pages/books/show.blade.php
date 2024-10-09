@extends('layouts.app')
@section('title')
Название литературы
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        <div class="row">
            <h3 class="center"></h3>
        </div>
        <div class="row">
        <div class="col-6">
                <div>
                    <b>Обложка: </b>
                    <img src="{{env('URL')}}{{$book->cover}}" class="little-image">
                </div>
            </div>
            <div class="col-6">
                <div>
                    <b>Название: </b>
                    <h2>{{$book->name->name}}</h2>
                    <b>Возрастное ограничение: </b>
                    <h5>{{ $book->age->age }}</h5>
                    <b>Аннотация: </b>
                    <h5>{{ $book->annotation->annotation }}</h5>
                    <b>Год издания: </b>
                    <h5>{{ $book->year->year }}</h5>
                    <b>Издательство: </b>
                    <h5>{{ $book->house->house }}</h5>
                    <b>Язык: </b>
                    <h5>{{ $book->language->language }}</h5>
                    <b>Обложка: </b>
                    <h5>{{ $book->binding->binding }}</h5>
                    <b>Тип: </b>
                    <h5>{{ $book->type->type }}</h5>
                    <b>ISBN: </b>
                    <h5>{{ $book->ISBN }}</h5>
                </div>
            </div>
        </div>

        @if(Auth::user()->role_id == 2)
            <div class="row">
                <div class="col-4">
                    <a href="{{ route('books.edit', ['book' => $book->id]) }}"
                        class="text-primary d-block"><button>Изменить</button></a>
                </div>
                <div class="col-4">
                    <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="text-primary d-block"><button>Добавить
                            теги</button></a>
                </div>
                <div class="col-4">
                    <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="text-primary d-block"><button>Добавить
                            автора</button></a>
                </div>
            </div>
            <div class="row margin-top-20">
                <div class="col-4">
                    <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="text-primary d-block"><button>Добавить
                            переводчика</button></a>
                </div>
                <div class="col-4">
                    <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="text-primary d-block"><button>Добавить
                            жанр</button></a>
                </div>
            </div>
            <div class="row margin-top-20">
                <div class="col-4">
                <form action="{{ route('books.destroy', ['book' => $book->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Удалить"
                                onclick="return confirm('Вы действительно хотите удалить запись?')">
                        </form>
                </div>
            </div>
        @endif

        @if(Auth::user()->role_id == 1)
            <div class="row">
                <div class="col-4">
                    <form action="{{ route('books.read_category', parameters: ['book' => $book->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <x-text-input id="it_abandoned" type="hidden" name="it_abandoned" value="0" />
                        <x-text-input id="it_read" type="hidden" name="it_read" value="1" />
                        <x-text-input id="it_want_read" type="hidden" name="it_want_read" value="0" />
                        <x-text-input id="it_now_read" type="hidden" name="it_now_read" value="0" />
                        <x-primary-button> {{ __('Прочитанное') }}</x-primary-button>
                    </form>
                </div>
                <div class="col-4">
                    <form action="{{ route('books.read_category', parameters: ['book' => $book->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <x-text-input id="it_abandoned" type="hidden" name="it_abandoned" value="0" />
                        <x-text-input id="it_read" type="hidden" name="it_read" value="0" />
                        <x-text-input id="it_want_read" type="hidden" name="it_want_read" value="1" />
                        <x-text-input id="it_now_read" type="hidden" name="it_now_read" value="0" />
                        <x-primary-button> {{ __(key: 'Хочу прочитать') }}</x-primary-button>
                    </form>
                </div>
                <div class="col-4">
                    <form action="{{ route('books.read_category', parameters: ['book' => $book->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <x-text-input id="it_abandoned" type="hidden" name="it_abandoned" value="1" />
                        <x-text-input id="it_read" type="hidden" name="it_read" value="0" />
                        <x-text-input id="it_want_read" type="hidden" name="it_want_read" value="0" />
                        <x-text-input id="it_now_read" type="hidden" name="it_now_read" value="0" />
                        <x-primary-button> {{ __('Брошено') }}</x-primary-button>
                    </form>
                </div>
            </div>
            <div class="row margin-top-20">
                <div class="col-4">
                    <form action="{{ route('books.read_category', parameters: ['book' => $book->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <x-text-input id="it_abandoned" type="hidden" name="it_abandoned" value="0" />
                        <x-text-input id="it_read" type="hidden" name="it_read" value="0" />
                        <x-text-input id="it_want_read" type="hidden" name="it_want_read" value="0" />
                        <x-text-input id="it_now_read" type="hidden" name="it_now_read" value="1" />
                        <x-primary-button> {{ __('Читаю сейчас') }}</x-primary-button>
                    </form>
                </div>
                <div class="col-4">
                    <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="text-primary d-block"><button>Добавить
                            рецензию</button></a>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="right"><a href="{{ route('books.index') }}">Назад</a></div>
            </div>
        </div>
    </div>
</main>
@endsection