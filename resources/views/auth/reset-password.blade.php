@extends('layout')
@section('title', 'Обновление пароля')
@section('body_type', 'background_type6')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 register_form site_form">

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email -->
                        <input type="hidden" name="email" value="{{ $request->email }}">

                        <!-- Password -->
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

                        <!-- Password confirmation -->
                        <div class="mb-3 row">
                            <label for="password_confirmation"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Подтвердите пароль') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="password" name="password_confirmation" class="form-control-plaintext"
                                       id="password_confirmation"
                                       value="" required>
                                @error('password_confirmation')
                                <p style="color:red; font-weight: bold">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')"/>
                        <div class="d-flex justify-content-between flex-wrap mt-4">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-danger ml-4">{{ __('Обновить пароль') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection


