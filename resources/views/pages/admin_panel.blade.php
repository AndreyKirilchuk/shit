@extends('layouts/index')

@section('content')
    @include('components/header')

    <div class="container">
        <h2>Заявления:</h2>

        @if($applications->isNotEmpty())
            <div class="applications_container">
                @foreach($applications as $application)
                    <div class="application">
                        <h4>Заявление номер {{$application->id}}</h4>
                        <div>Номер: {{$application->number}}</div>
                        <div>Описание: {{$application->about}}</div>
                        <div>ФИО подавшего: {{$application->user_name}}</div>

                        @if($application->status != 'Новая')
                           <div>
                               Стаус: {{$application->status}}
                           </div>
                        @else
                            <form action="/application/{{$application->id}}" method="post">
                                @method('PATCH')
                                @csrf
                                <label for="status">Статус:</label>
                                <select name="status" id="status">
                                    <option value="{{$application->status}}">{{$application->status}}</option>
                                    <option value="Подтверждено">Подтверждено</option>
                                    <option value="Отклонено">Отклонено</option>
                                </select>
                                <button>Изменить</button>
                            </form>
                        @endif


                    </div>
                @endforeach
            </div>
        @else
            Заявления не существуют
        @endif
    </div>
@endsection

