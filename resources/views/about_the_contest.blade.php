@extends('layout')
@section('title', 'О конкурсе')
@section('body_type', 'background_type1')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>О конкурсе</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text">
                        {!! $text->text !!}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

