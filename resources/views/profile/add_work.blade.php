@extends('layout')
@section('title', 'Добавление работы')
@section('body_type', 'background_type6')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 registere_form site_form">
                    <form method="POST" action="{{ route('work.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- title -->
                        <div class="mb-3 row">
                            <label for="title" class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Название') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="title" name="title" class="form-control-plaintext" id="title"
                                       value="{{ old('title') }}" required>
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- type -->
                        <div class="mb-3 row">
                            <label for="type" class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Форма') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <select name="type" id="type" class="form-select" aria-label="Форма" required>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->title }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Photo -->
                        <div class="mb-3 row">
                            <label for="photo" class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Работа (JPG, GIF, WEBM)') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="file" name="photo" class="form-control-plaintext" id="photo"
                                       value="" required>
                                @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
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

