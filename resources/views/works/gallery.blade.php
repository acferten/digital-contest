@extends('layout')
@section('title', 'Галерея')
@section('body_type', 'background_type6')
{{--@section('body_type', 'background_type4_1')--}}
@section('background')
@endsection
@section('content')
    <main class="flex-grow-1" style="margin-top: -2px">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h1>Галерея</h1>
                </div>
            </div>
            <div class="gallery">
                <div class="row">
                    @foreach($works as $work)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 item">
                            <a href="{{ route('works.show', [$work->id]) }}">
                                <div class="img">
                                    <img
                                        src="{{ $work->getWorkFileUrl() }}"
                                        alt="{{ $work->title }}">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="title">{{ $work->title }}</div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="description d-flex flex-column items-start">
                                            <span
                                                class="js-work__rating js-work_{{ $work->id }}_rating">{{ $work->votes()->count() }}
                                            </span>
                                            {{ trans_choice('validation.votes', $work->votes()->count()) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <x-vote-button :$work/>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
