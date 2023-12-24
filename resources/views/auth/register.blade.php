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
                <div class="col-md-8 offset-md-2 registere_form site_form">
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
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
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
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
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
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Surname -->
                        <div class="mb-3 row">
                            <label for="surname" class="col-xl-3 col-xxl-2 col-form-label">{{ __('Фамилия') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="text" name="surname" class="form-control-plaintext" id="surname"
                                       value="{{ old('surname') }}">
                                @error('surname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Name -->
                        <div class="mb-3 row">
                            <label for="name" class="col-xl-3 col-xxl-2 col-form-label">{{ __('Имя') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="text" name="name" class="form-control-plaintext" id="name"
                                       value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Nickname -->
                        <div class="mb-3 row">
                            <label for="nickname"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Псевдоним') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="text" name="nickname" class="form-control-plaintext" id="nickname"
                                       value="{{ old('nickname') }}" required>
                                @error('nickname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Photo -->
                        <div class="mb-3 row">
                            <label for="photo" class="col-xl-3 col-xxl-2 col-form-label">{{ __('Фото/аватар') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="file" name="photo" class="form-control-plaintext" id="photo"
                                       value="">
                                @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- About_yourself -->
                        <div class="mb-3 row">
                            <label for="about_yourself"
                                   class="col-xl-3 col-xxl-2 col-form-label">{{ __('Краткая информация о себе') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <textarea name="about_yourself" class="form-control" id="about_yourself"
                                          rows="3">{{ old('about_yourself') }}</textarea>
                                @error('about_yourself')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
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

