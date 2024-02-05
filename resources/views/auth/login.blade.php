@extends('layout')
@section('title', 'Dashboard')
@section('background')
    <div style="background-color:black;" id="background"></div>

        <video autoplay muted loop id="background">
            <source src="/dist/video/ArtNFT_Fon1_Gorizont.webm" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
@endsection
@section('content')
    <main class="d-flex flex-column flex-grow-1">
        <div class="container gap-4 d-flex flex-column justify-content-center align-items-center flex-grow-1 main-text">
            <div class="row w-100">
                <div>
                    <h2 class="text-center">вход</h2>
                </div>
            </div>
            <div class="row w-100">
                <div class="col-md-4 offset-md-4 lo     gin_form site_form">
                    <form method="POST" action="/login">
                        @csrf
                        <!-- Email Address -->
                        <div class="mb-2">
                            <label for="email" class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                            <div class="col-sm-12">
                                <input type="email" name="email" class="form-control-plaintext" id="email"
                                       value="{{ old('email') }}" required>
                                @error('email')
                                <p style="color:red; font-weight: bold">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- password -->
                        <div class="mb-4">
                            <label for="password" class="col-sm-2 col-form-label">{{ __('Пароль') }}</label>
                            <div class="col-sm-12">
                                <input type="password" name="password" class="form-control-plaintext" id="password"
                                       value="" required>
                                @error('password')
                                <p style="color:red; font-weight: bold">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex flex-column mb-4 mt-4">
                            <div class="mb-4 flex-grow-1">
                                <button type="submit" class="btn btn-danger w-100">{{ __('Войти') }}</button>
                            </div>
                            <a class="text-decoration-none text-center text-sm text-white dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                               href="{{ route('register') }}">
                                {{ __('Создать бесплатный аккаунт') }}
                            </a>
                            @if (Route::has('password.request'))
                                <a class="text-decoration-none text-center text-sm text-white dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                   href="{{ route('password.request') }}">
                                    {{ __('Забыли пароль?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
