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
                        <input type="hidden" name="_method" value="PATCH">
                        @csrf
                        <!-- text -->
                        <div class="mb-3 row">
                            <label for="text"
                                   class="col-xl-3 col-xxl-2 col-form-label">{{ __('Текст') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <textarea name="text" class="form-control" id="text"
                                          rows="3">{{ $content->text }}</textarea>
                                @error('about')
                                <p style="color:red; font-weight: bold">{{$message}}</p>
                                @enderror

                            </div>
                        </div>

                        <div class="d-flex justify-content-between flex-wrap mt-4">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-danger ml-4">{{ __('Обновить текст') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

