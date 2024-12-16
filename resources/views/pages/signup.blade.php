@extends('layouts/index')

@section('content')
    <div class="container">
        <form action="/signup" class="form_center" method="post">
            @csrf
            <h2>Регистрация:</h2>

            <div>
                <label for="login">Логин</label>
                <input type="text" placeholder="user" required id="login" name="login">
            </div>

            <div>
                <label for="email">Почта</label>
                <input type="email" placeholder="user@mail.ru" required id="email" name="email">
            </div>

            <div>
                <label for="name">ФИО</label>
                <input type="text" placeholder="user userovich userov" required id="name" name="name" min="6">
            </div>

            <div>
                <label for="number">Номер</label>
                <input type="text" placeholder="+7(XXX)-XXX-XX-XX" required id="number" name="number" min="11" max="11">
            </div>

            <div>
                <label for="password">Пароль</label>
                <input type="password" placeholder="••••••••" required id="password" name="password" min="6">
            </div>

            <div>
                <label for="password2">Подтверждение пароля</label>
                <input type="password" placeholder="••••••••" required id="password2" name="password2" min="6">
            </div>

            @if ($errors->any())
                <div class="error">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <button>Зарегистрироваться</button>

            <div>
                Уже зарегестрированны ? <a href="/login">Авторизация</a>
            </div>
        </form>
    </div>

@endsection


