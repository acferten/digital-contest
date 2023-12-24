<?php

use App\Helpers\ImageHelper;

$file_prefix = config('filesystems.disks.public.url');
?>
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
                                <img
                                    src="{{ $file_prefix . ImageHelper::getThumbnailImage($user, $user->photo, 'large') }}">
                            </div>
                            <div class="offset-lg-1 col-lg-8 col-md-8 col-sm-12 col-12 profile_data">
                                <div class="name">
                                    {{ $user->name }}
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        {{ $user->email }}
                                    </div>
                                    <div class="col-12">
                                        <a href="{{ route('work.create') }}" class="btn btn-danger">Добавить работу</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($user->work)
                        <div class="container">
                            <div class="row">
                                <h2>Работы</h2>
                                <div class="gallery">
                                    <div class="row">
                                        @foreach($user->work as $work)
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 item">
                                                <div class="img">
                                                    <img
                                                        src="{{ $file_prefix . ImageHelper::getThumbnailImage($work, $work->photo, 'large') }}"
                                                        alt="{{ $work->title }}">
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="title"><a
                                                                href="{{ route('gallery.card', [$work->slug]) }}">{{ $work->title }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <a href="{{ route('vote', [$work->id]) }}" class="btn btn-danger float-end js-gallery-vote">Голосовать</a>
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
