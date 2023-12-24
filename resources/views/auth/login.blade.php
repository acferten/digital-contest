@extends('layout')
@section('title', 'Dashboard')
@section('background')
    <div style="background-color:black;" id="background"></div>

    {{--    <video autoplay muted loop id="background">--}}
    {{--        <source src="/dist/video/ArtNFT_Fon1_Gorizont.mp4" type="video/mp4">--}}
    {{--        Your browser does not support HTML5 video.--}}
    {{--    </video>--}}
@endsection
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4 login_form site_form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label required">{{ __('Email') }}</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control-plaintext" id="email"
                                       value="{{ old('email') }}" required>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <!-- password -->
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label required">{{ __('Пароль') }}</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control-plaintext" id="password"
                                       value="" required>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                            <label class="form-check-label" for="remember_me">{{ __('Запомнить меня') }}</label>
                        </div>

                        <div class="d-flex justify-content-between flex-wrap mt-4">
                            <div class="mb-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                       href="{{ route('password.request') }}">
                                        {{ __('Забыли пароль?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-danger ml-4">{{ __('Вход') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
