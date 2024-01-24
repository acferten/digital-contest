@extends('layout')
@section('title', 'Регистрация')
@section('background')
    <div style="background-color:black;" id="background"></div>


        <video autoplay muted loop id="background">
            <source src="/dist/video/ArtNFT_Fon1_Gorizont.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
@endsection
@section('content')
    <main class="d-flex flex-column flex-grow-1">
        <div class="container gap-4 d-flex flex-column justify-content-center align-items-center flex-grow-1 main-text">
            <div class="row w-100">
                <div>
                    <h2 class="text-center">регистрация</h2>
                </div>
            </div>
            <div class="col-md-4 register_form site_form">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex gap-3">
                        <!-- last_name -->
                        <div class="mb-3 flex-grow-1">
                            <label for="last_name" class="col-form-label">{{ __('Фамилия') }}</label>
                            <div>
                                <input type="text" name="last_name" class="form-control-plaintext" id="last_name"
                                       value="{{ old('last_name') }}">
                                @error('last_name')
                                <p style="color:red; font-weight: bold">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- Name -->
                        <div class="mb-3 flex-grow-1">
                            <label for="first_name" class="col-form-label">{{ __('Имя') }}</label>
                            <div>
                                <input type="text" name="first_name" class="form-control-plaintext" id="first_name"
                                       value="{{ old('first_name') }}">
                                @error('first_name')
                                <p style="color:red; font-weight: bold">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email"
                               class="R col-form-label">{{ __('Email') }}</label>
                        <div>
                            <input type="email" name="email" class="form-control-plaintext" id="email"
                                   value="{{ old('email') }}" required>
                            @error('email')
                            <p style="color:red; font-weight: bold">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- username -->
                    <div class="mb-3">
                        <label for="username"
                               class="col-form-label">{{ __('Псевдоним') }}</label>
                        <div>
                            <input type="text" name="username" class="form-control-plaintext" id="username"
                                   value="{{ old('username') }}" required>
                            @error('username')
                            <p style="color:red; font-weight: bold">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- password -->
                    <div class="mb-3">
                        <label for="password"
                               class="col-form-label">{{ __('Пароль') }}</label>
                        <div>
                            <input type="password" name="password" class="form-control-plaintext" id="password"
                                   value="" required>
                            @error('password')
                            <p style="color:red; font-weight: bold">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- password_confirmation -->
                    <div class="mb-3">
                        <label for="password_confirmation"
                               class="col-form-label">{{ __('Подтверждение пароля') }}</label>
                        <div>
                            <input type="password" name="password_confirmation" class="form-control-plaintext"
                                   id="password_confirmation"
                                   value="" required>
                            @error('password_confirmation')
                            <p style="color:red; font-weight: bold">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    {{--                    <!-- profile_picture -->--}}
                    {{--                    <div class="mb-3">--}}
                    {{--                        <label for="profile_picture"--}}
                    {{--                               class="col-form-label">{{ __('Фото/аватар') }}</label>--}}
                    {{--                        <div>--}}
                    {{--                            <input type="file" name="profile_picture" class="form-control-plaintext"--}}
                    {{--                                   id="profile_picture"--}}
                    {{--                                   value="">--}}
                    {{--                            @error('profile_picture')--}}
                    {{--                            <p style="color:red; font-weight: bold">{{$message}}</p>--}}
                    {{--                            @enderror--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <!-- about -->--}}
                    {{--                    <div class="mb-3">--}}
                    {{--                        <label for="about"--}}
                    {{--                               class="col-form-label">{{ __('Краткая информация о себе') }}</label>--}}
                    {{--                        <div>--}}
                    {{--                                <textarea name="about" class="form-control" id="about"--}}
                    {{--                                          rows="3">{{ old('about') }}</textarea>--}}
                    {{--                            @error('about')--}}
                    {{--                            <p style="color:red; font-weight: bold">{{$message}}</p>--}}
                    {{--                            @enderror--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    <div class="d-flex flex-column mb-4 mt-4">
                        <div class="mb-4 flex-grow-1">
                            <button type="submit" class="btn btn-danger w-100">{{ __('Регистрация') }}</button>
                        </div>
                        <a class="text-decoration-none text-center text-sm text-white dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                           href="{{ route('login') }}">{{ __('Уже зарегистрированы?') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

