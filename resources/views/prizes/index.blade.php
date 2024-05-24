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
            <div class="prizes">
                <div class="d-flex flex-wrap justify-content-between align-content-start">
                    <x-success-alert/>
                    @foreach($prizes as $prize)
                        <div class="col-md-4 col-12 item my-4">
                            <img src="{{$prize->getPrizePhotoUrl()}}" alt="{{ $prize->title }}">
                            <div class="place my-4"><span>{{ $prize->title }}</span></div>
                            <div class="description">{!! $prize->description !!}</div>
                            @role('admin')
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

