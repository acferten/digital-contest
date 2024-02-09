@extends('layout')
@section('title', 'Галерея')
@section('body_type', 'background_type6')
{{--@section('body_type', 'background_type4_1')--}}
@section('background')
@endsection
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Галерея</h1>
                </div>

                <div class="col-12">
                    <form method="get" action="{{route('search')}}" class="mb-4">
                        <div class="d-flex">
                            <input type="text" name="search" class="form-control" id="search" placeholder="Поиск"
                                   value="{{request('search')}}">
                            <select name="category" class="form-control" id="category">
                                <option value="" disabled selected>Категория</option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->id}}"
                                        {{ isset($requested_category) && $requested_category == $category->id ? 'selected' : ''}}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            <input type="submit" class="btn btn-danger" id="search"
                                   value="Найти" placeholder="Поиск">
                        </div>
                    </form>
                </div>

            </div>
            <div class="gallery">
                <div class="row">
                    @forelse($works as $work)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 item">
                            <a href="{{ route('works.show', [$work->id]) }}">
                                <div class="img">
                                    <img
                                        src="{{ $work->getWorkFileUrl() }}"
                                        alt="{{ $work->title }}">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="title">{{ $work->title }}</div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="description d-flex flex-column items-start">
                                            <span
                                                class="js-work__rating js-work_{{ $work->id }}_rating">{{ $work->votes()->count() }}
                                            </span>
                                            {{ trans_choice('validation.votes', $work->votes()->count()) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <x-vote-button :$work/>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <p>По заданным параметрам поиска работ не найдено</p>
                    @endforelse
                    @if(!$works->isEmpty())
                        {{ $works->links() }}
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
