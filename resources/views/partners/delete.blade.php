@extends('layout')
@section('title', 'Удаление партнера')
@section('body_type', 'background_type4')
@section('content')
    <main class="d-flex flex-grow-1 align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="subtitle my-4">Вы действительно хотите удалить партнера?</p>
                </div>
            </div>
            <div class="prizes">
                <div class="row">
                    <div class="col-md-4 col-12 item my-4">
                        <img src="{{ $partner->getLogoUrl() }}" alt="prize photo">
                        <div class="place first my-4"><span>{{ $partner->name }}</span></div>
                        <form action="{{ route('partners.destroy', $partner) }}" method="POST">
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

