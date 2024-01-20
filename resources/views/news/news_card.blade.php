@extends('layout')
@section('title', 'Новость')
@section('body_type', 'background_type5')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Новости</h1>
                </div>
            </div>
            <div class="news-card">
                <div class="row">
                    <div class="col-12 item">
                        <div class="date">{{ \Carbon\Carbon::create($news->publication_date)->translatedFormat('d.m.Y') }}</div>
                        <div class="title">{{ $news->title }}</div>
                        <div class="description">{{ $news->content }}</div>
                    </div>
                </div>
                @if($next || $prev)
                    <div class="row news-nav">
                        <div class="prev">
                            @if($prev)
                                <a href="{{ route('news.show', $prev) }}" class="prev" title="Предыдущая новость"><span class="arrow"></span></a>
                            @endif
                        </div>
                        <div class="next">
                            @if($next)
                                <a href="{{ route('news.show', $next) }}" class="next" title="Следующая новость"><span class="arrow"></span></a>
                            @endif
                        </div>
                    </div>
                @endif
                <div class="row">
                <a href="{{route('news.index')}}">Возврат к списку новостей</a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
    </main>
@endsection
