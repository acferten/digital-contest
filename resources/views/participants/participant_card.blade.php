@extends('layout')
@section('title', 'Профиль')
@section('body_type', 'background_type6')
@section('content')
<main class="flex-grow-1">
    <div class="main-text">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Участник</h1>
                </div>
                <div class="container profile">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12 col-12 profile_photo">
                            <img src="{{ $user->getProfilePictureUrl() }}" alt="profile picture">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($user->works)
                <div class="container">
                    <br>
                    <div class="row">
                        <h2>Работы</h2>
                        <div class="gallery">
                            <br>
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