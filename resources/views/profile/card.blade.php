@extends('layout')
@section('title', 'Профиль')
@section('body_type', 'background_type6')
@section('content')
    <main class="flex-grow-1">
        <div class="main-text">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @role('admin')
                        <h1>Профиль администратора</h1>
                        @else
                            <h1>Профиль</h1>
                            @endrole
                    </div>
                    <div class="container profile">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-12 col-12 profile_photo">
                                <img src="{{ $user->getProfilePictureUrl() }}" alt="profile picture">

                                    <a href="{{ route('avatar.edit') }}" class="btn btn-danger btn-hide">Обновить фотографию</a>

                            </div>
                            <div class="offset-lg-1 col-lg-8 col-md-8 col-sm-12 col-12 profile_data">
                                <div class="name">
                                    {{ $user->first_name }}
                                    <br>
                                    {{ $user->last_name }}
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        {{ $user->email }}
                                        <br>
                                        <br>
                                    </div>

                                    @role('admin')
                                    <div class="col-12">
                                        <a href="{{ route('prizes.create') }}" class="btn btn-danger">Добавить
                                            приз</a>
                                    </div>
                                    <br>
                                    <div class="col-12">
                                        <a href="{{ route('partners.create') }}" class="btn btn-danger">Добавить
                                            партнера</a>
                                    </div>
                                    <br>
                                    <div class="col-12">
                                        <a href="{{ route('news.create') }}" class="btn btn-danger">Добавить
                                            новость</a>
                                    </div>
                                    <br>
                                    <div class="col-12">
                                        <a href="{{ route('products.edit', 2) }}" class="btn btn-danger">Изменить цену голосования</a>
                                    </div>
                                    <br>
                                    <div class="col-12">
                                        <a href="{{ route('products.edit', 1) }}" class="btn btn-danger">Изменить цену размещения</a>
                                    </div>

                                    @else

                                        <div class="col-12">
                                            <a href="{{ route('works.create') }}" class="btn btn-danger">Добавить
                                                работу</a>
                                        </div>
                                        @endrole

                                </div>
                            </div>
                        </div>
                    </div>

                    @if($user->works->isNotEmpty())
                        <div class="container">
                            <div class="row">
                                <h2>Работы</h2>
                                <div class="gallery">
                                    <div class="row">
                                        @foreach($user->works as $work)
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 item">
                                                <div class="img">
                                                    <img
                                                        src="{{$work->getWorkFileUrl()}}"
                                                        alt="{{ $work->title }}">
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="title"><a
                                                                href="{{ route('works.show', [$work->id]) }}">{{ $work->title }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </main>
@endsection
