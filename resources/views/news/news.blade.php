@extends('layout')
@section('title', 'Новости')
@section('body_type', 'background_type5')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Новости</h1>
                </div>
            </div>
            <div class="news">
                <div class="row">
                    @forelse($news as $new)
                        @php
                            $date = \Carbon\Carbon::createFromFormat('Y-m-d', $new->publication_date)->format('d.m.Y');
                        @endphp
                        <div class="col-md-4 col-12 item">
                            <a href="{{ route('news.card', ['url' => $new->url]) }}">
                                <div class="date">{{ $date }}</div>
                                <div class="title">{{ $new->title }}</div>
                            </a>
                        </div>
                    @empty
                        <div class="col-md-4 col-12">Новостей нет!</div>
                        @endforelse
                </div>
            </div>
        </div>
    </main>
@endsection
