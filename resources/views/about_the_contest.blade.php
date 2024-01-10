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
                    <div class="text" style="word-break: break-all">
                        {{ $text ? $text->text :  Str::random(1000) }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

