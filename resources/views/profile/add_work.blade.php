@extends('layout')
@section('title', 'Добавление работы')
@section('body_type', 'background_type6')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 register_form site_form">
                    <form method="POST" action="{{route('works.store')}}" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div class="mb-3 row">
                            <label for="title" class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Название') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="text" name="title" class="form-control-plaintext" id="title"
                                       value="{{ old('title') }}" required>
                                @error('title')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Genre -->
                        <div class="mb-3 row">
                            <label for="type" class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Форма') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <select name="genre_id" id="genre" class="form-select" aria-label="Форма" required>
                                    @foreach($genres as $genre)
                                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                    @endforeach
                                </select>
                                @error('genre_id')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- File -->
                        <div class="mb-3 row">
                            <label for="file"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Работа (JPG, GIF, WEBM)') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="file" name="file" class="form-control-plaintext" id="file" required>
                                @error('file')
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

