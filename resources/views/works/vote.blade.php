@extends('layout')
@section('title', 'Добавление голосов')
@section('body_type', 'background_type6')
@section('content')
    <main class="d-flex flex-grow-1 align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 register_form site_form">
                    <div class="row">
                        <p class="form-title my-4">Добавление голосов к работе «{{ $work->title }}»</p>
                    </div>
                    <x-success-alert/>
                    <form method="POST" action="{{route('works.vote.store', $work)}}">
                        @csrf
                        <!-- price -->
                        <div class="row">
                            <label for="amount"
                                   class="col-xl-3 col-xxl-2 col-form-label">{{ __('Количество голосов') }}</label>
                            <div class="col-xl-3 col-xxl-3">
                                <input type="number" name="amount" class="form-control-plaintext" id="amount"
                                       value="" required>
                                @error('amount')
                                <p class="error"> {{$message}} </p>
                                @enderror
                                @if($errors->any())
                                    {{ implode('', $errors->all('<div>:message</div>')) }}
                                @endif
                            </div>
                        </div>

                        <div class="d-flex justify-content-between flex-wrap mt-4">
                            <div class="my-4">
                                <button type="submit" class="btn btn-danger ml-4">{{ __('Добавить') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

