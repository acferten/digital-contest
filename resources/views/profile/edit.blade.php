@extends('layout')
@section('title', 'Профиль')
@section('body_type', 'background_type6')
@section('content')
    <main class="flex-grow-1">
        <div class="main-text">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Профиль</h1>
                    </div>
                    <div class="container profile">
                        <div class="row">
                            <div class="col-3 profile_photo">
                                <img src="/dist/images/dest/participants/User_photo_1.png">
                            </div>
                            <div class="offset-1 col-8 profile_data">
                                <div class="name">
                                    {{ $user->name }}
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        Страна
                                    </div>
                                    <div class="col-6">
                                        Город
                                    </div>
                                    <div class="col-6">
                                        E-Mail
                                    </div>
                                    <div class="col-6">
                                        Работы
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
