@php
    use App\Helpers\Text;
@endphp
@extends('layout')
@section('title', 'Рейтинг участников')
@section('body_type', 'background_type6')
{{--@section('body_type', 'background_type4_1')--}}
@section('background')
    <video autoplay muted loop id="background">
        <source src="video/ArtNFT_Fon1_Gorizont.webm" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
@endsection
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h1>Рейтинг работ</h1>
                </div>
                <div class="col-4">
                    <a href="#" class="btn btn-danger float-end mt-3">Поиск</a>
                </div>
            </div>
            <div class="rating">
                @forelse($works as $work)
                    @php
                        $class = collect(['first', 'second', 'third']);
                    @endphp
                    <div class="row place align-items-end {{ $class[$loop->iteration] ?? '' }}">
                        <div class="col-8">
                            <div class="title">{{ ($page - 1) * 10 + $loop->iteration }}. <a href="{{ route('works.show', [$work->id]) }}">«{{ $work->title }}
                                    »</a></div>
                            <div class="participant">{{ $work->user->last_name }} {{ $work->user->first_name }}</div>
                        </div>

                        <div class="col voices d-flex flex-nowrap gap-4 align-items-center">
                            <div>
                                <div class="number">{{ $work->votes()->count() }}</div>
                                {{ trans_choice('validation.votes', $work->votes()->count()) }}
                            </div>
                            @if($work->bonus_points)
                                <div>
                                    <div class="number">+</div>
                                </div>
                                <div>
                                    <div class="number">{{ $work->bonus_points }}</div>
                                    {{ trans_choice('validation.bonus_points', $work->bonus_points) }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <br>
                @empty
                    <p>Работ не найдено</p>
                @endforelse
                @if(!$works->isEmpty())
                    {{ $works->links() }}
                @endif
            </div>
        </div>
    </main>
@endsection
