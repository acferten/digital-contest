@extends('layout')
@section('title', 'Добавление приза')
@section('body_type', 'background_type6')
@section('content')
    <main class="d-flex flex-grow-1 align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 register_form site_form">
                    <div class="row">
                        <p class="subtitle my-4">ДОБАВЛЕНИЕ ПРИЗА</p>
                    </div>
                    <form method="POST" action="{{route('prizes.store')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- title -->
                        <div class="mb-3 row">
                            <label for="title"
                                   class="col-xl-3 col-xxl-2 col-form-label">{{ __('Краткое название') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="text" name="title" maxlength="20" class="form-control" id="title" required>
                                @error('title')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- description -->
                        <div class="mb-3 row">
                            <label for="description"
                                   class="col-xl-3 col-xxl-2 col-form-label">{{ __('Описание') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <textarea name="description" class="form-control html_editor" id="description"
                                          required></textarea>
                                @error('description')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- photo -->
                        <div class="mb-3 row">
                            <label for="photo"
                                   class="col-xl-3 col-xxl-2 col-form-label">{{ __('Фото приза') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="file" name="photo" class="form-control" id="photo" required>
                                @error('photo')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- importance -->
                        <div class="mb-3 row">
                            <label for="title"
                                   class="col-xl-3 col-xxl-2 col-form-label">{{ __('Важность') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="number" name="importance" min="1" class="form-control" id="importance"
                                       required>
                                @error('importance')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- submit -->
                        <div class="row my-4">
                            <div>
                                <button type="submit" class="btn btn-danger ml-4">{{ __('Добавить приз') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

