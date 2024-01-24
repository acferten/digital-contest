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
                        <div
                            class="date">{{ \Carbon\Carbon::create($news->publication_date)->translatedFormat('d.m.Y') }}</div>
                        <div class="title">{{ $news->title }}</div>
                        <div class="description">{{ $news->content }}</div>
                    </div>
                </div>
                @if($next || $prev)
                    <div class="d-flex flex-row justify-content-between">
                        <div class="h-25 p-22" style="transform: rotate(90deg); width: 150px;">
                            @if($next)
                                <a href="{{ route('news.show', $next) }}" title="Следующая новость">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25">
                                        <path style="fill:#232326"
                                              d="m18.294 16.793-5.293 5.293V1h-1v21.086l-5.295-5.294-.707.707L12.501 24l6.5-6.5-.707-.707z"/>
                                    </svg>
                                </a>
                            @endif
                        </div>

                        <div class="h-25 p-22" style="transform: rotate(270deg); width: 150px;">
                            @if($prev)
                                <a href="{{ route('news.show', $prev) }}" title="Предыдущая новость">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25">
                                        <path style="fill:#232326"
                                              d="m18.294 16.793-5.293 5.293V1h-1v21.086l-5.295-5.294-.707.707L12.501 24l6.5-6.5-.707-.707z"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
                <div class="d-flex flex-row mt-5 justify-content-between">
                    <a href="{{route('news.index')}}">Возврат к списку новостей</a>
                    @role('admin')
                    <a href="{{ route('news.edit', $news)  }}" class="ml-2 btn btn-danger">Редактировать
                        новость</a>
                    @endrole
                </div>
            </div>
        </div>
    </main>
@endsection
