@extends('layouts.app')
@section('title')
Регистрация
@endsection
@section('content')
<main>
          <div class="margin-top-50"></div>
          <div class="container">
               <div class="row">
                    <h1 class="center">Регистрация</h1>
               </div>
               <div class="row">
                    <div class="col-2 col-md-3"></div>
                    <div class="col-8 col-md-6 background-lilac-52">
                         <div class="center">
                              <form method="post">
                                   @csrf
                                   <input type="text" placeholder="Логин"><br>
                                   <input type="text" placeholder="Имя" class="margin-top-20"><br>
                                   <input type="password" placeholder="Пароль" class="margin-top-20"><br>
                                   <input type="password" placeholder="Повтор пароля" class="margin-top-20"><br>
                                   <input type="submit" value="Зарегистрироваться" class="margin-top-20"><br>
                              </form>
                              <div class="font-size-12 margin-top-10">Есть аккаунт? <a href="/">Войдите!</a></div>
                         </div>
                    </div>
                    <div class="col-2 col-md-3"></div>
               </div>
          </div>
     </main>
@endsection