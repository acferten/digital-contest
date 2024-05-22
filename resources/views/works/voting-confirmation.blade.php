@extends('layout')
@section('title', 'Удаление новости')
@section('body_type', 'background_type5')
@section('content')
    <main class="d-flex flex-grow-1 align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="subtitle my-4">Вы действительно проголосовать за работу?</p>
                </div>
            </div>
            <div class="news-card">
                <div class="row">
                    <div class="col-md-4 col-12 item my-4">
                        <div class="row">
                            <div class="col-12 item">
                                <div class="date">{{ $work->title }}</div>
                                <div class="title">{{ $work->user->username }}</div>
                            </div>
                        </div>
                        <form action="{{ route('works.vote', $work) }}" method="POST">
                            @csrf
                            <div class="col-4 my-4 w-100">
                                <input type="submit" class="w-100 btn btn-danger" value="Проголосовать">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

