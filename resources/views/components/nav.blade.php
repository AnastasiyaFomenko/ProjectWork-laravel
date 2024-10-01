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
        <li><a href="/register">Регистрация</a></li>
        <li><a href="/cabinet">Личный кабинет</a></li>
        <li><a href="/about">О нас</a></li>
        <li><a href="/name_books">Название литературы</a></li>
        <li><a href="/posts">Посты</a></li>
    </ul>
</div>


<script type="text/javascript"> !function () {

        const toggleButton = document.getElementsByClassName('toggle-button')[0]
        const navbarLinks = document.getElementsByClassName('navbar-links')[0]

        // при клике на кнопку меня переключаем состояние меню
        toggleButton.addEventListener('click', () => navbarLinks.classList.toggle('active'))

    }()</script>