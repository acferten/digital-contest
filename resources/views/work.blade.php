@php
    use App\Helpers\ImageHelper;
    use App\Helpers\Text;
    $file_prefix = config('filesystems.disks.public.url');
@endphp
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
                    </div>
                    <div class="container work">
                        <div class="row">
                            <div class="col-3 work_photo">
                                <div class="img">
                                    <img
                                        src="{{ $file_prefix . ImageHelper::getThumbnailImage($work, $work->photo, 'large') }}"
                                        alt="{{ $work->title }}">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="work__rating js-work__rating js-work_{{ $work->id }}_rating">{{ $work->votes }}</div>
                                        <div
                                            class="work__rating-unit">{{ Text::plural($work->votes, ['голос', 'голоса', 'голосов']) }}</div>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('vote', [$work->id]) }}" class="btn btn-danger float-end js-gallery-vote">Голосовать</a>
                                    </div>
                                </div>
                            </div>
                            <div class="offset-1 col-8 work_data">
                                <div class="name">
                                    {{ $work->user->fio }}
                                </div>
                                @if($other_works)
                                <div class="row">
                                    <div class="col-12">
                                        Работы автора:
                                        <ul class="work__other-work">
                                            @foreach($other_works as $other_work)
                                            <li><a href="{{ route('gallery.card', [$other_work->slug]) }}">«{{ $other_work->title }}»</a></li>
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
