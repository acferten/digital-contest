@extends('layout')
@section('title', "Голосование за работу {$work->title}")
@section('body_type', 'background_type5')
@section('content')
    <main class="d-flex col-lg-5 flex-grow-1 align-items-center mx-auto">
        <div class="container mx-auto">
            <div class="row">
                <div class="col-12">
                    <p class="subtitle my-4">Вы действительно проголосовать за работу?</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 my-4">
                    <div class="row">
                        <p class="w-100">
                            Каждый пользователь может проголосовать бесплатно за любую работу один раз в сутки. Вы
                            можете проголосовать бесплатно завтра или проголосовать платно.
                            Отдать понравившейся работе 5 голосов стоит 50 руб.
                            При желании платно можно проголосовать за несколько картин в день. Но не более, чем по 500
                            рублей за одну работу.
                        </p>
                        @if(auth()->user()->canVoteAgain($work, $price*5))
                            <div class="mb-4">
                                <x-robokassa-payment-button :$work :price="$price*5">Отдать 5 голосов работе
                                </x-robokassa-payment-button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

