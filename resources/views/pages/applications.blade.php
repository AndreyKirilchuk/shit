@extends('layouts/index')

@section('content')
    @include('components/header')

    <div class="container">
       <h2>Мои заявления:</h2>

        @if($applications->isNotEmpty())
            <div class="applications_container">
                @foreach($applications as $application)
                    <div class="application">
                        <h4>Заявление номер {{$application->id}}</h4>
                        <h4>ФИО подавшего {{$application->name}}</h4>
                        <div>Номер: {{$application->number}}</div>
                        <div>Описание: {{$application->about}}</div>
                    </div>
                @endforeach
            </div>
        @else
            У вас нет заявлений, можете оставить его по <a href="/make_applications">ссылке</a>
        @endif


    </div>



@endsection

