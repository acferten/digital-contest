@extends('layout')
@section('title', 'Партнеры')
@section('body_type', 'background_type4')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Партнеры</h1>
                </div>
            </div>
            <x-success-alert/>

            <div class="partners">
                <div class="d-flex flex-wrap justify-content-between align-content-start mb-4">
                    @foreach($partners as $partner)
                        <div>
                            <img class="mt-4" src="{{ $partner->getLogoUrl() }}" alt="{{ $partner->name }}">
                            @role('admin')
                            <div class="col-4 my-4 w-100">
                                <a href="{{ route('partners.delete', $partner) }}"
                                   class="w-100 btn btn-danger">Удалить</a>
                            </div>
                            @endrole
                        </div>
                    @endforeach
                </div>

                <div class="row mt-4">
                    <p class="text mt-4">{!! $content->text !!}</p>
                </div>
                @role('admin')
                <div class="col-12">
                    <a href="{{ route('contents.edit', $content ) }}" class="btn btn-danger">Редактировать
                        текст</a>
                </div>
                @endrole
            </div>
        </div>
    </main>
@endsection
