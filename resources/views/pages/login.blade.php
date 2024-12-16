@extends('layouts/index')

@section('content')
    <div class="container">
        <form action="/login" class="form_center" method="post">
            @csrf
            <h2>Авторизация:</h2>

            <div>
                <label for="login">Логин</label>
                <input type="text" placeholder="user" required id="login" name="login">
            </div>

            <div>
                <label for="password">Пароль</label>
                <input type="password" placeholder="••••••••" required id="password" name="password" min="6">
            </div>

            @if ($errors->any())
                <div class="error">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <button>Войти</button>

            <div>
                Еще не зарегестрированны ? <a href="/signup">Регистрация</a>
            </div>
        </form>
    </div>

@endsection

