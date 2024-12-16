@extends('layouts/index')

@section('content')
    @include('components/header')

    <div class="container">
        <form action="/applications" class="form_center" method="post">
            @csrf
            <h2>Формирование заявления:</h2>

            <div>
                <label for="number">Номер автомобиля</label>
                <input type="text" placeholder="МС123МС" required id="number" name="number">
            </div>

            <div>
                <label for="about">Описание</label>
                <textarea placeholder="Припарковался в неположенном месте" required id="about" name="about">

                </textarea>
            </div>

            @if ($errors->any())
                <div class="error">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <button>Отправить</button>
        </form>
    </div>

@endsection

