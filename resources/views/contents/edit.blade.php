@extends('layout')
@section('title', 'Редактирование текста')
@section('body_type', 'background_type1')
@section('content')
    <main class="d-flex flex-grow-1 align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 register_form site_form">
                    <div class="row">
                        <p class="subtitle my-4">ОБНОВЛЕНИЕ ТЕКСТА</p>
                    </div>
                    <form method="POST" action="{{ route('contents.update', $content) }}">
                        @method('PATCH')
                        @csrf
                        <!-- text -->
                        <div class="mb-3 row">
                            <label for="text"
                                   class="col-xl-3 col-xxl-2 col-form-label">{{ __('Текст') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <textarea name="text" class="form-control html_editor" id="text"
                                          rows="3">{{ $content->text }}</textarea>
                                @error('about')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- submit -->
                        <div class="my-4">
                            <div>
                                <button type="submit" class="btn btn-danger ml-4">{{ __('Обновить текст') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

