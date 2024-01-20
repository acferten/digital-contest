@extends('layout')
@section('title', 'Добавление новости')
@section('body_type', 'background_type6')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 register_form site_form">
                    <form method="POST" action="{{route('news.store')}}">

                        @csrf


                        <!-- title -->
                        <div class="mb-3 row">
                            <label for="title"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Заголовок') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="text" name="title" class="form-control-plaintext" id="title"
                                       value="{{ old('title') }}" required>
                                @error('title')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- content -->
                        <div class="mb-3 row">
                            <label for="content"
                                   class="col-xl-3 col-xxl-2 col-form-label">{{ __('Содержание') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <textarea name="content" class="form-control" id="content"
                                          rows="3">{{ old('content') }}</textarea>
                                @error('content')
                                <p style="color:red; font-weight: bold">{{$message}}</p>
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

