@extends('layout')
@section('title', 'Добавление приза')
@section('body_type', 'background_type6')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 register_form site_form">
                    <form method="POST" action="{{route('products.update', $product)}}">

                        @csrf
                        <p class="work__rating-unit">{{$product->name}}</p>
                        <!-- price -->
                        <div class="mb-3 row">
                            <label for="price"
                                   class="col-xl-3 col-xxl-2 col-form-label required">{{ __('Цена') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="number" name="price" class="form-control-plaintext" id="price"
                                       value="{{ $product->price }}" required>
                                @error('price')
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

