@extends('layout')
@section('title', 'Работа')
@section('body_type', 'background_type6')
@section('content')
    <main class="flex-grow-1">
        <div class="main-text">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="work-title">
                            {{$work->title}}
                        </h1>
                        <p class="subtitle my-4">{{$work->genre->name }}, {{$work->year }} год</p>
                    </div>
                    <div class="container work">
                        <div class="d-flex row flex-wrap justify-content-between">
                            <div class="d-flex flex-column col-lg-3 col-md-4 col-sm-12 col-12 work_photo">
                                <div class="w-100 h-100">
                                    <img class="w-100" src="{{ $work->getWorkFileUrl() }}" alt="{{ $work->title }}">
                                </div>
                                <div class="row py-4">
                                    <div class="col">
                                        <div
                                            class="work__rating">{{$work->votes()->count()}}</div>
                                        <div
                                            class="work__rating-unit">{{ trans_choice('validation.votes', $work->votes()->count()) }}</div>
                                    </div>
                                    <x-vote-button :work="$work"/>
                                </div>
                            </div>

                            <div
                                class="offset-lg-1 col-lg-8 col-md-8 col-sm-12 col-12 work_data d-flex flex-column justify-content-between">
                                <div class="name">
                                     {{ $work->user->last_name }} {{ $work->user->first_name }}
                                </div>

                                @if($other_works)
                                    <div class="row py-4">
                                        <div class="col-12">
                                            Другие работы автора:
                                            <ul class="work__other-work">
                                                @foreach($other_works as $other_work)
                                                    <li>
                                                        <a href="{{ route('works.show', [$other_work->id]) }}">«{{ $other_work->title }}»</a>{{ $loop->last ? '' : ',' }}
                                                    </li>
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
