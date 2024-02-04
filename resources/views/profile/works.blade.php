@extends('layout')
@section('title', 'Ваши работы')
@section('body_type', 'background_type6')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="gallery">
                <div class="row">
                    <h1 class="my-4">Ваши работы</h1>
                    @foreach($works as $work)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 item">
                            <div class="img">
                                <img
                                    src="{{ $work->getWorkFileUrl() }}"
                                    alt="{{ $work->title }}">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="title"><a
                                            href="{{ route('works.show', [$work->id]) }}"
                                        >{{ $work->title }}</a>
                                    </div>
                                    <div class="description">
                                        <span
                                            class="js-work__rating js-work_{{ $work->id }}_rating">{{ $work->votes()->count() }}</span> {{ trans_choice('validation.votes', $work->votes()->count()) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
