@extends('layout')
@section('title', 'Удаление работы')
@section('body_type', 'background_type6')
@section('content')
    <main class="d-flex flex-grow-1 align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="subtitle my-4">Вы действительно хотите удалить работу?</p>
                </div>
            </div>
            <div class="prizes">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-12 item my-4">
                        <img class="w-100" src="{{$work->getWorkFileUrl()}}" alt="work photo">
                        <div class="place first my-4"><b><span>{{ $work->title }}</span></b></div>
                        <div class="description">{{$work->user->first_name}} {{$work->user->last_name}}</div>
                        <form action="{{ route('works.destroy', $work) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="col-4 my-4 w-100">
                                <input type="submit" class="w-100 btn btn-danger" value="Удалить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

