@extends('layout')
@section('title', 'ArtBattle')
@section('background')
    <div style="background-color:black;" id="background"></div>
    <video autoplay muted loop id="background">
        <source src="/dist/video/ArtNFT_Fon1_Gorizont.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
@endsection
@section('content')
    <main class="flex-grow-1 d-flex align-items-center mx-auto">
        <div class="main-text">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 mb-4 themed-grid-col first-block">
                        Конкурс <i>цифрового</i> искусства
                    </div>
                    <div class="col-6 col-md-4 themed-grid-col second-block d-flex align-items-center">
                        Стань создателем уникальной метавселенной
                    </div>
                </div>
                <div class="row"></div>
            </div>
        </div>
    </main>
@endsection
