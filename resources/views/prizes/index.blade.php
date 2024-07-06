@extends('layout')
@section('title', 'Призы победителям')
@section('body_type', 'background_type3')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Призы победителям</h1>
                </div>
            </div>
            <x-success-alert />
            <div class="prizes container">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-5">
                    @foreach($prizes as $prize)
                        <div class="col">
                            <img src="{{$prize->getPrizePhotoUrl()}}" alt="{{ $prize->title }}" class="prizes__image">
                            <div class="place my-4"><span class="prizes__title">{{ $prize->title }}</span></div>
                            <p class="prizes__description">{!! $prize->description !!}</p>
                            @role('admin')
                            <div class="col-4 my-4 w-100">
                                <a href="{{ route('prizes.edit', $prize) }}" class="w-100 btn btn-danger">Редактировать</a>
                            </div>
                            <div class="col-4 my-4 w-100">
                                <a href="{{ route('prizes.delete', $prize) }}" class="w-100 btn btn-danger">Удалить</a>
                            </div>

                            @endrole
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection

