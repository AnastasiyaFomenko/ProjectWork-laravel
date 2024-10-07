<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-4 col-lg-4">
            <a href="/"><img src="https://kapibar.hb.ru-msk.vkcloud-storage.ru/logo.png"></a>
        </div>
    </div>
</div>
<!-- кнопака - гамбургер меню -->
<a href="#" class="toggle-button">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
</a>

<!-- ссылки навигации по сайту  -->
<div class="navbar-links one">
    <ul class="topmenu ul">
    <li><a href="/about">О нас</a></li>
        <li><a href="/name_books">Название литературы</a></li>
        <li><a href="/posts">Посты</a></li>
        @if (Route::has('login'))
            @auth
                <li><a href="{{ url('/dashboard') }}">Профиль</a></li>
            @else
            <li><a href="{{ route('login') }}">Авторизация</a></li>
                @if (Route::has('register'))
                <li><a href="{{ route('register') }}"> Регистрация</a></li>
                @endif
            @endauth
        @endif
    </ul>
</div>


<script type="text/javascript"> !function () {

        const toggleButton = document.getElementsByClassName('toggle-button')[0]
        const navbarLinks = document.getElementsByClassName('navbar-links')[0]

        // при клике на кнопку меня переключаем состояние меню
        toggleButton.addEventListener('click', () => navbarLinks.classList.toggle('active'))

    }()</script>