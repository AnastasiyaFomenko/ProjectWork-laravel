@extends('layouts.app')
@section('title')
Изменить книгу
@endsection
@section('content')
<main>
    <div class="margin-top-50"></div>
    <div class="container">
        @if(Auth::user()->role_id == 2)
            <div class="row">
                <h3 class="center">Изменить книгу</h3>
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
                        <form action="{{ route('books.update', ['book' => $book->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <x-input-label for="name_id" :value="__('Id названия')" />
                            <x-text-input id="name_id" type="text" name="name_id" required autofocus
                                value="{{ $book->name_id  }}" />
                            <x-input-error :messages="$errors->get('name_id')" />

                            <x-input-label for="age_limit_id" :value="__('Id возрастного ограничения')" />
                            <x-text-input id="age_limit_id" type="text" name="age_limit_id" required
                                value="{{ $book->age_id  }}" />
                            <x-input-error :messages="$errors->get('age_limit_id')" />

                            <x-input-label for="annotation_id" :value="__('Id аннотация')" />
                            <x-text-input id="annotation_id" type="text" name="annotation_id" required
                                value="{{ $book->annotation_id  }}" />
                            <x-input-error :messages="$errors->get('annotation_id')" />

                            <x-input-label for="year_id" :value="__('Id года выпуска')" />
                            <x-text-input id="year_id" type="text" name="year_id" required value="{{ $book->year_id  }}" />
                            <x-input-error :messages="$errors->get('year_id')" />

                            <x-input-label for="house_id" :value="__('Id издания')" />
                            <x-text-input id="house_id" type="text" name="house_id" required
                                value="{{ $book->house_id  }}" />
                            <x-input-error :messages="$errors->get('house_id')" />

                            <x-input-label for="language_id" :value="__('Id языка книги')" />
                            <x-text-input id="language_id" type="text" name="language_id" required
                                value="{{ $book->language_id  }}" />
                            <x-input-error :messages="$errors->get('language_id')" />

                            <x-input-label for="annotation_id" :value="__('Id аннотация')" />
                            <x-text-input id="annotation_id" type="text" name="annotation_id" required
                                value="{{ $book->annotation_id  }}" />
                            <x-input-error :messages="$errors->get('annotation_id')" />

                            <x-input-label for="binding_id" :value="__('Id обложки')" />
                            <x-text-input id="binding_id" type="text" name="binding_id" required
                                value="{{ $book->binding_id  }}" />
                            <x-input-error :messages="$errors->get('binding_id')" />

                            <x-input-label for="type_id" :value="__('Id типа литературы')" />
                            <x-text-input id="type_id" type="text" name="type_id" required value="{{ $book->type_id  }}" />
                            <x-input-error :messages="$errors->get('type_id')" />

                            <x-input-label for="ISBN" :value="__('ISBN')" />
                            <x-text-input id="ISBN" type="text" name="ISBN" required value="{{ $book->ISBN  }}" />
                            <x-input-error :messages="$errors->get('ISBN')" />

                            <x-input-label for="cover" :value="__('Обложка книги')" />
                            <x-text-input id="cover" type="file" name="cover" />
                            <x-input-error :messages="$errors->get('cover')" />

                            <x-primary-button>
                                {{ __('Изменить книгу') }}
                            </x-primary-button>
                        </form>
                        <div class="right"><a href="{{ route('books.show', ['book' => $book->id]) }}">Назад</div>
                    </div>
                </div>
                <div class="col-2 col-md-3"></div>
            </div>
        @endif
        @if(Auth::user()->role_id == 1)
            <div class="background-lilac-52">
                <h1><a href="{{ route('books.index')}}">Дорогой пользователь, вернитесь назад!</a></h1>
            </div>
        @endif
    </div>
</main>
@endsection