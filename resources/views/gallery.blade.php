<?php

use App\Helpers\ImageHelper;
use App\Helpers\Text;

$file_prefix = config('filesystems.disks.public.url');
?>
@extends('layout')
@section('title', 'Галерея')
@section('body_type', 'background_type4_1')
@section('background')
    <video autoplay muted loop id="background">
        <source src="video/ArtNFT_Fon1_Gorizont.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
@endsection
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h1>Галерея</h1>
                </div>
                <div class="col-4">
                    <a href="#" class="btn btn-danger float-end mt-3">Поиск</a>
                </div>
            </div>
            <div class="gallery">
                <div class="row">
                    @foreach($works as $work)
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
                                    <div class="description">
                                        <span class="js-work__rating js-work_{{ $work->id }}_rating">{{ $work->votes }}</span> {{ Text::plural($work->votes, ['голос', 'голоса', 'голосов']) }}</div>
                                </div>
                                <div class="col">
                                    <a href="{{ route('vote', [$work->id]) }}"
                                       class="btn btn-danger float-end js-gallery-vote">Голосовать</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
