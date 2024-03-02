@extends('layout')
@section('title', 'Призы победителям')
@section('body_type', 'background_type3')
@section('content')
    <main class="d-flex flex-grow-1 align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="subtitle my-4">Вы действительно хотите удалить приз?</p>
                </div>
            </div>
            <div class="prizes">
                <div class="row">
                    <div class="col-md-4 col-12 item my-4">
                        <img src="{{$prize->getPrizePhotoUrl()}}" alt="prize photo">
                        <div class="place first my-4"><span>{{ $prize->title }}</span></div>
                        <div class="description">{!! $prize->description !!}</div>
                        <form action="{{ route('prizes.destroy', $prize) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="col-4 my-4 w-100">
                                <input type="submit" class="w-100 btn btn-danger" value="Удалить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

