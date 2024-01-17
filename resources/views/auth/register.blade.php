@extends('layout')
@section('title', 'Регистрация')
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
                <div class="col-md-8 offset-md-2 register_form site_form">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3 row">
                            <label for="email"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Email') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="email" name="email" class="form-control-plaintext" id="email"
                                       value="{{ old('email') }}" required>
                                @error('email')
                                <p style="color:red; font-weight: bold">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- password -->
                        <div class="mb-3 row">
                            <label for="password"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Пароль') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="password" name="password" class="form-control-plaintext" id="password"
                                       value="" required>
                                @error('password')
                                <p style="color:red; font-weight: bold">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- password_confirmation -->
                        <div class="mb-3 row">
                            <label for="password_confirmation"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Подтверждение пароля') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="password" name="password_confirmation" class="form-control-plaintext"
                                       id="password_confirmation"
                                       value="" required>
                                @error('password_confirmation')
                                <p style="color:red; font-weight: bold">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- last_name -->
                        <div class="mb-3 row">
                            <label for="last_name" class="col-xl-3 col-xxl-2 col-form-label">{{ __('Фамилия') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="text" name="last_name" class="form-control-plaintext" id="last_name"
                                       value="{{ old('last_name') }}">
                                @error('last_name')
                                <p style="color:red; font-weight: bold">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- Name -->
                        <div class="mb-3 row">
                            <label for="first_name" class="col-xl-3 col-xxl-2 col-form-label">{{ __('Имя') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="text" name="first_name" class="form-control-plaintext" id="first_name"
                                       value="{{ old('first_name') }}">
                                @error('first_name')
                                <p style="color:red; font-weight: bold">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- username -->
                        <div class="mb-3 row">
                            <label for="username"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Псевдоним') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="text" name="username" class="form-control-plaintext" id="username"
                                       value="{{ old('username') }}" required>
                                @error('username')
                                <p style="color:red; font-weight: bold">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- profile_picture -->
                        <div class="mb-3 row">
                            <label for="profile_picture" class="col-xl-3 col-xxl-2 col-form-label">{{ __('Фото/аватар') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="file" name="profile_picture" class="form-control-plaintext" id="profile_picture"
                                       value="">
                                @error('profile_picture')
                                <p style="color:red; font-weight: bold">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- about -->
                        <div class="mb-3 row">
                            <label for="about"
                                   class="col-xl-3 col-xxl-2 col-form-label">{{ __('Краткая информация о себе') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <textarea name="about" class="form-control" id="about"
                                          rows="3">{{ old('about') }}</textarea>
                                @error('about')
                                <p style="color:red; font-weight: bold">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between flex-wrap mt-4">
                            <div class="mb-4">
                                <a class="" href="{{ route('login') }}">{{ __('Уже зарегистрированы?') }}</a>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-danger ml-4">{{ __('Регистрация') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

