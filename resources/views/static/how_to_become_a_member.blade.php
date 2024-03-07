@extends('layout')
@section('title', 'Как стать участником')
@section('body_type', 'background_type2')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Как стать участником</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-12">
                    <ul class="steps">
                        <li>
                            Зарегистрируйтесь
                        </li>
                        <li>
                            Загрузите работы
                        </li>
                    </ul>

                </div>
                <div class="col-md-4 col-12">
                    <div class="d-grid gap-2 col-12 mx-auto">
                        <a href="{{ route('register') }}" class="btn btn-danger">Регистрация</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

