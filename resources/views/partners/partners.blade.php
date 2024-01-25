@extends('layout')
@section('title', 'Партнеры')
@section('body_type', 'background_type4')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Партнеры</h1>
                </div>
            </div>
            <div class="partners">
                <div class="row first-row">
                    @foreach($partners as $partner)
                        <img src="{{$partner->getLogoUrl()}}" alt="{{$partner->name}}">
                    @endforeach
                </div>

                <div class="row">
                    <p>{{$content->text}}</p>
                </div>
                @role('admin')
                <div class="col-12">
                    <a href="{{ route('contents.edit', $content ) }}" class="btn btn-danger">Редактировать
                        текст</a>
                </div>
                <br>
                @endrole
                </div>
            </div>
        </div>
    </main>
@endsection
