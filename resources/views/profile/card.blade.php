@extends('layout')
@section('title', 'Профиль')
@section('body_type', 'background_type6')
@section('content')
    <main class="flex-grow-1">
        <div class="main-text">
            <div class="container">
                <div class="row">
                    <div class="col-12 profile-title">
                        <h1>Профиль</h1>
                    </div>
                    <div class="container profile profile--desktop">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-12 col-12 profile_photo">
                                <img src="{{ $user->getProfilePictureUrl() }}" alt="profile picture">
                                <a href="{{ route('avatar.edit') }}" class="mt-4 w-100 btn btn-danger">Обновить
                                    фотографию</a>
                                <a href="{{ route('profile.edit') }}" class="mt-4 w-100 btn btn-danger">Редактировать
                                    профиль</a>
                                @unlessrole('admin')
                                <a href="{{ route('works.create') }}" class="mt-4 btn btn-danger w-100">Добавить
                                    работу</a>
                                @endrole
                            </div>

                            <div
                                class="offset-lg-1 col-lg-8 col-md-8 col-sm-12 col-12 profile_data d-flex flex-column">
                                <div class="name mb-4">
                                    {{ $user->first_name }}<br>
                                    {{ $user->last_name }}
                                </div>
                                @role('admin')
                                <div class="row mb-3">
                                    <div class="col">
                                        <a href="{{ route('prizes.create') }}" class="btn btn-danger">Добавить
                                            приз</a>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('products.edit', 2) }}" class="btn btn-danger">Изменить цену
                                            голосования</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <a href="{{ route('partners.create') }}" class="btn btn-danger">Добавить
                                            партнера</a>
                                    </div>

                                    <div class="col">
                                        <a href="{{ route('products.edit', 1) }}" class="btn btn-danger">Изменить
                                            цену
                                            размещения</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col w-100">
                                        <a href="{{ route('news.create') }}" class="btn btn-danger">Добавить
                                            новость</a>
                                    </div>
                                </div>
                                @else
                                    <div
                                        class="col-lg-9 col-md-4 col-sm-12 col-12 d-flex flex-column w-100 justify-content-between flex-wrap flex-grow-1 justify-content-between">

                                        <p class="w-100 mb-4" style="font-size: 0.9rem;">{{ $user->about }}</p>


                                        <div class="subtitle d-flex justify-content-between">

                                            <a href="{{ route('profile.works') }}">Ваши работы</a>

                                            <a href="{{ route('profile.payments') }}">Ваши оплаты</a>
                                        </div>
                                    </div>
                                    @endrole
                            </div>
                        </div>
                    </div>
                    <div class="container profile profile--mobile">
                        <div class="w-100">
                            <div class="d-flex justify-content-center profile_photo">
                                <img src="{{ $user->getProfilePictureUrl() }}" alt="profile picture">
                            </div>
                            <div
                                class="w-100 profile_data d-flex flex-column">
                                <div class="name text-center mt-4 mb-4">
                                    {{ $user->first_name }}<br>
                                    {{ $user->last_name }}
                                </div>
                                <div
                                    class="col-lg-9 col-md-4 col-sm-12 col-12 d-flex flex-column w-100 justify-content-between flex-wrap flex-grow-1 justify-content-between">
                                    <p class="w-100 mb-4" style="font-size: 0.9rem;">{{ $user->about }}</p>
                                </div>
                                <div class="row mb-3">
                                    <div class="col w-100">
                                        <a href="{{ route('avatar.edit') }}" class="w-100 btn btn-danger">Обновить
                                            фотографию</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col w-100">
                                        <a href="{{ route('profile.edit') }}" class="w-100 btn btn-danger">Редактировать
                                            профиль</a>
                                    </div>
                                </div>
                                @role('admin')
                                <div class="row mb-3">
                                    <div class="col">
                                        <a href="{{ route('prizes.create') }}" class="btn btn-danger w-100">Добавить
                                            приз</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <a href="{{ route('products.edit', 2) }}" class="btn btn-danger w-100">Изменить
                                            цену
                                            голосования</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <a href="{{ route('partners.create') }}" class="btn btn-danger w-100">Добавить
                                            партнера</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <a href="{{ route('products.edit', 1) }}" class="btn btn-danger w-100">Изменить
                                            цену
                                            размещения</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col w-100">
                                        <a href="{{ route('news.create') }}" class="btn btn-danger w-100">Добавить
                                            новость</a>
                                    </div>
                                </div>
                                @else
                                    <div class="row mb-3">
                                        <div class="col w-100">
                                            <a href="{{ route('works.create') }}" class="w-100 btn btn-danger w-100">Добавить
                                                работу</a>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col w-100">
                                            <a href="{{ route('profile.works') }}" class="btn btn-danger w-100">Ваши
                                                работы</a>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col w-100">
                                            <a href="{{ route('profile.payments') }}" class="btn btn-danger w-100">Ваши
                                                оплаты</a>
                                        </div>
                                    </div>
                                    @endrole
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
