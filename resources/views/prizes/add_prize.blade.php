@extends('layout')
@section('title', 'Добавление приза')
@section('body_type', 'background_type6')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 register_form site_form">
                    <form method="POST" action="{{route('prizes.store')}}" enctype="multipart/form-data">

                        @csrf

                        <!-- place -->
                        <div class="mb-3 row">
                            <label for="place"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Место') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="number" name="place" class="form-control-plaintext" id="place"
                                       value="{{ old('place') }}" required>
                                @error('place')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- description -->
                        <div class="mb-3 row">
                            <label for="title"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Описание') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="text" name="description" class="form-control-plaintext" id="description"
                                       value="{{ old('description') }}" required>
                                @error('description')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- photo -->
                        <div class="mb-3 row">
                            <label for="photo"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Фото приза') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="file" name="photo" class="form-control-plaintext" id="photo" required>
                                @error('photo')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between flex-wrap mt-4">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-danger ml-4">{{ __('Добавить') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

