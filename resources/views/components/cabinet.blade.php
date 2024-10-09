<div class="margin-top-50"></div>
<div class="container">
    <div class="row">
        <div class="col-8 col-md-3">
            <img src="{{env('URL')}}{{Auth::user()->avatar}}"
                class="circle-image little-image">
        </div>
        <div class="col-4 col-md-9">
            <p>{{Auth::user()->name}} {{Auth::user()->surname}}</p>
        </div>
    </div>
</div>
<div class="container-fluid background-lilac-52 margin-top-20">
    <div class="row font-size-little">
        <div class="col-12 col-md-1"><a href="{{ route('profile.show', ['profile' => Auth::user()->id])}}">Мой профиль</a></div>
        <div class="col-12 col-md-2"><a href="{{ route('read_books')}}"> Прочитанное</a></div>
        <div class="col-12 col-md-2"><a href="{{ route('want_read_books')}}"> Хочу прочитать</a></div>
        <div class="col-12 col-md-1"><a href="{{ route('abandoned_books')}}"> Брошено</a></div>
        <div class="col-12 col-md-2"><a href="{{ route('now_read_books')}}"> Читаю сейчас</a></div>
        <div class="col-12 col-md-2"><a href="{{route('user_reviews')}}"> Мои рецензии</a></div>
        <div class="col-12 col-md-1"><a href="{{route('user_posts')}}"> Мои статьи</a></div>
    </div>
</div>