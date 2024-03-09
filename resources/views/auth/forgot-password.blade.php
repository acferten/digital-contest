@extends('layout')
@section('title', 'Забыли пароль?')
@section('body_type', 'background_type6')
@section('content')
    <main class="d-flex flex-grow-1 align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="my-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>
                    <form class="my-4" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <!-- Email -->
                        <div class="my-4 row">
                            <label for="email"
                                   class="col-xl-3 col-xxl-2 col-form-label">{{ __('Email') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="email" name="email" class="form-control-plaintext" id="email" required>
                                @error('email')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>
                        <!-- Session Status -->
                        <x-auth-session-status class="my-4" :status="session('status')"/>
                        <div class="d-flex justify-content-between flex-wrap mt-4">
                            <div class="mb-4">
                                <button type="submit"
                                        class="btn btn-danger ml-4">{{ __('Отправить ссылку для сброса пароля') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection


