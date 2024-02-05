@extends('layout')
@section('title', 'Профиль')
@section('body_type', 'background_type6')
@section('content')
    <main class="flex-grow-1">
        <div class="main-text">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                            <h1>Профиль</h1>
                    </div>
                    <div class="container profile">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-12 col-12 profile_photo">
                                <img src="{{ $user->getProfilePictureUrl() }}" alt="profile picture">
                                    <a href="{{ route('avatar.edit') }}" class="mt-4 w-100 btn btn-danger">Обновить фотографию</a>
                                    <a href="{{ route('profile.edit') }}" class="mt-4 w-100 btn btn-danger">Редактировать профиль</a>
                            </div>
                            <div
                                class="offset-lg-1 col-lg-8 col-md-8 col-sm-12 col-12 profile_data d-flex flex-column justify-content-between">
                                <div class="name mb-4">
                                    {{ $user->first_name }}<br>
                                    {{ $user->last_name }}
                                </div>

                                @role('admin')
                                <a href="{{ route('prizes.create') }}" class="btn btn-danger">Добавить
                                            приз</a>

                                <a href="{{ route('partners.create') }}" class="btn btn-danger">Добавить
                                            партнера</a>

                                <a href="{{ route('news.create') }}" class="btn btn-danger">Добавить
                                            новость</a>

                                <a href="{{ route('products.edit', 2) }}" class="btn btn-danger">Изменить цену
                                    голосования</a>

                                <a href="{{ route('products.edit', 1) }}" class="btn btn-danger">Изменить цену
                                    размещения</a>
                                @else
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-column justify-content-between py-4 pr-4">
                                            <a href="{{ route('profile.works') }}">Работы</a>
                                        </div>

                                        <div class="d-flex flex-column justify-content-between py-4">
                                            <a href="{{ route('profile.payments') }}">Оплаты</a>
                                        </div>
                                    </div>

                                    <a href="{{ route('works.create') }}" class="btn btn-danger">Добавить
                                                работу</a>
                                @endrole
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
