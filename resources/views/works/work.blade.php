@extends('layout')
@section('title', 'Работа')
@section('body_type', 'background_type6')
@section('content')
    <main class="flex-grow-1">
        <div class="main-text">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Картина «{{ $work->title }}»</h1>

                        <p>{{$work->genre->name }}, {{$work->year }} год</p>
                    </div>
                    <div class="container work">
                        <div class="row">
                            <div class="col-3 work_photo">
                                <div class="img">
                                    <img
                                        src="{{ $work->getWorkFileUrl() }}"
                                        alt="{{ $work->title }}">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div
                                            class="work__rating js-work__rating js-work_{{ $work->id }}_rating">{{$work->votes()->count()}}</div>
                                        <div
                                            class="work__rating-unit">{{ trans_choice('validation.votes', $work->votes()->count()) }}</div>
                                    </div>
                                    <div class="col">
                                        <form method="POST" action="{{ route('vote', [$work->id]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger float-end">Голосовать</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="offset-1 col-8 work_data">
                                <div class="name">
                                    {{ $work->user->first_name }} {{ $work->user->last_name }}
                                </div>

                                @if($other_works)
                                    <div class="row">
                                        <div class="col-12">
                                            Работы автора:
                                            <ul class="work__other-work">
                                                @foreach($other_works as $other_work)
                                                    <li>
                                                        <a href="{{ route('works.show', [$other_work->id]) }}">«{{ $other_work->title }}
                                                            »</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
