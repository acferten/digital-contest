@extends('layout')
@section('title', 'Изменение цены')
@section('body_type', 'background_type6')
@section('content')
    <main class="d-flex flex-grow-1 align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 register_form site_form">
                    <div class="row">
                        <p class="form-title my-4">{{$product->name}}</p>
                    </div>
                    @if (!empty(session('success')))
                        <div class="col-12">
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    <form method="POST" action="{{route('products.update', $product)}}">
                        @csrf
                        @method('PUT')
                        <!-- price -->
                        <div class="row">
                            <label for="price"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Цена') }}</label>
                            <div class="col-xl-3 col-xxl-3">
                                <input type="number" name="price" class="form-control-plaintext" id="price"
                                       value="{{ $product->price }}" required>
                                @error('price')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between flex-wrap mt-4">
                            <div class="my-4">
                                <button type="submit" class="btn btn-danger ml-4">{{ __('Обновить') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

