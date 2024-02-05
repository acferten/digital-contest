@php
    use App\Helpers\Text;
@endphp
@extends('layout')
@section('title', 'Рейтинг участников')
@section('body_type', 'background_type4_1')
@section('background')
    <video autoplay muted loop id="background">
        <source src="video/ArtNFT_Fon1_Gorizont.webm" type="video/mp4">
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
                @foreach($works as $work)
                    @php
                        $class = collect(['first', 'second', 'third']);
                    @endphp
                    <div class="row place align-items-end {{ $class[$loop->iteration] ?? '' }}">
                        <div class="col-8">
                            <div class="title">{{ $loop->iteration }}. <a href="{{ route('works.show', [$work->id]) }}">«{{ $work->title }}»</a></div>
                            <div class="participant">{{ $work->user->first_name }}</div>
                        </div>
                        <div class="col-md-2 voices">
                            <div class="number">{{ $work->votes()->count() }}</div>
                            {{ trans_choice('validation.votes', $work->votes()->count()) }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
