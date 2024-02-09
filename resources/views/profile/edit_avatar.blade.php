@extends('layout')
@section('title', 'Обновление фотографии профиля')
@section('body_type', 'background_type6')
@section('content')
    <main class="d-flex flex-grow-1 align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 register_form site_form">
                    <form method="POST" action="{{route('avatar.update')}}" enctype="multipart/form-data">
                        <div class="row">
                            <p class="form-title">Обновление фотографии профиля</p>
                        </div>
                        @csrf
                        <!-- file -->
                        <div class="mb-3 row">
                            <label for="avatar"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Аватар') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="file" name="avatar" class="form-control" id="avatar" required>
                                @error('avatar')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between flex-wrap mt-4">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-danger ml-4">{{ __('Обновить') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

