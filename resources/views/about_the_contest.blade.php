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
                        {{ $content ? $content->text :  'Текст этого раздела еще не добавлен администратором.' }}
                    </div>
                </div>
                @role('admin')
                <div class="col-12">
                    <a href="{{ route('contents.edit', $content ) }}" class="btn btn-danger">Редактировать
                        текст</a>
                </div>
                <br>
                @endrole
            </div>
        </div>
    </main>
@endsection

