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

                <div class="row">
                    @foreach($prizes as $prize)

                        <div class="col-md-4 col-12 item my-4">
                            <img src="{{$prize->getPrizePhotoUrl()}}" alt="prize photo">
                            <div class="place first my-4"><span>{{$loop->iteration}} МЕСТО</span> </div>
                            <div class="description">{{$prize->description}}</div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection

