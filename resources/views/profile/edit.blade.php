@extends('layout')
@section('title', 'Редактирование профиля')
@section('body_type', 'background_type6')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 register_form site_form">
                    <form method="POST" action="{{route('profile.update')}}">
                        <input type="hidden" name="_method" value="PATCH">

                        @csrf

                        <p class="subtitle">Личные данные</p>
                        <!-- first_name -->
                        <div class="mb-3 row">
                            <label for="first_name"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Имя') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="text" name="first_name" class="form-control-plaintext" id="first_name"
                                       value="{{$user->first_name}}" required>
                                @error('first_name')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- last_name -->
                        <div class="mb-3 row">
                            <label for="last_name"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Фамилия') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="text" name="last_name" class="form-control-plaintext" id="last_name"
                                       value="{{$user->last_name}}" required>
                                @error('last_name')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- username -->
                        <div class="mb-3 row">
                            <label for="username"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Никнейм') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="text" name="username" class="form-control-plaintext" id="username"
                                       value="{{$user->username}}" required>
                                @error('username')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- about -->
                        <div class="mb-3 row">
                            <label for="about"
                                   class="col-xl-3 col-xxl-2 col-form-label">{{ __('О себе') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <textarea name="about" class="form-control" id="about"
                                          rows="7">{{$user->about}}</textarea>
                                @error('about')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mb-4 mt-4">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-danger">{{ __('Обновить') }}</button>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="{{route('profile.security')}}">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">

                        <p class="subtitle">Безопасность</p>

                        <!-- email -->
                        <div class="mb-3 row">
                            <label for="email"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Email') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="email" name="email" class="form-control-plaintext" id="email"
                                       value="{{$user->email}}">
                                @error('email')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div>

                                <div class="d-flex flex-column justify-content-end mb-4 mt-4 align-items-end">
                                    <p class="error w-75"> {{ __('Ваш email не подтвержден. Можете получить ссылку для подтверждения на почту по кнопке ниже.') }}</p>
                                    <button form="send-verification"
                                            class="btn btn-danger w-75">
                                        {{ __('Отправить') }}
                                    </button>

                                </div>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        <!-- password -->
                        <div class="mb-3 row">
                            <label for="password"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Пароль') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="password" name="password" class="form-control-plaintext" id="password"
                                       value="">
                                @error('password')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- password -->
                        <div class="mb-3 row">
                            <label for="password_confirmation"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Повторите пароль') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="password" name="password_confirmation" class="form-control-plaintext"
                                       id="password_confirmation"
                                       value="">
                                @error('password_confirmation')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>


                        <div class="d-flex justify-content-end mb-4 mt-4">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-danger">{{ __('Обновить') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

