@extends('layout')
@section('title', 'Добавление нового партнера')
@section('body_type', 'background_type6')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 register_form site_form">
                    <form method="POST" action="{{route('partners.store')}}" enctype="multipart/form-data">

                        @csrf


                        <!-- name -->
                        <div class="mb-3 row">
                            <label for="title"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Название партнера') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="text" name="name" class="form-control-plaintext" id="name"
                                       value="{{ old('name') }}" required>
                                @error('name')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- logo -->
                        <div class="mb-3 row">
                            <label for="logo"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Логотип партнера') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="file" name="logo" class="form-control-plaintext" id="logo" required>
                                @error('logo')
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

