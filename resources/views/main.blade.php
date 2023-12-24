@extends('layout')
@section('title', 'WEBNFT')
@section('background')
    <div style="background-color:black;" id="background"></div>
{{--    <video autoplay muted loop id="background">--}}
{{--        <source src="/dist/video/ArtNFT_Fon1_Gorizont.mp4" type="video/mp4">--}}
{{--        Your browser does not support HTML5 video.--}}
{{--    </video>--}}
@endsection
@section('content')
    <main class="flex-grow-1">
        <div class="main-text">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 themed-grid-col first-block">
                        Конкурс <i>цифрового</i> искусства и nft
                    </div>
                    <div class="col-6 col-md-4 themed-grid-col second-block d-flex align-items-center">
                        Стань создателем уникальной метавселенной
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
