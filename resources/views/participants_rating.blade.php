@php
    use App\Helpers\Text;
@endphp
@extends('layout')
@section('title', 'Рейтинг участников')
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
                    <h1>Рейтинг участников</h1>
                </div>
                <div class="col-4">
                    <a href="#" class="btn btn-danger float-end mt-3">Поиск</a>
                </div>
            </div>
            <div class="rating">
                @foreach($works as $i => $work)
                    @php
                        $class = collect(['first', 'second', 'third']);
                    @endphp
                    <div class="row place align-items-end {{ $class[$i] ?? '' }}">
                        <div class="col-8">
                            <div class="title">{{ $i+1 }}. <a href="{{ route('gallery.card', [$work->slug]) }}">«{{ $work->title }}»</a></div>
                            <div class="participant">{{ $work->user->fio }}</div>
                        </div>
                        <div class="col-md-2 voices">
                            <div class="number">{{ $work->votes }}</div>
                            {{ Text::plural($work->votes, ['голос', 'голоса', 'голосов']) }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
