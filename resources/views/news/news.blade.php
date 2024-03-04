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
            @if (!empty(session('success')))
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="news">
                <div class="row">
                    @forelse($news as $new)
                        <div class="col-md-4 col-12 item">
                            <a href="{{ route('news.show', $new) }}">
                                <div class="date">{{ \Carbon\Carbon::create($new->publication_date)->translatedFormat('d.m.Y') }}</div>
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
