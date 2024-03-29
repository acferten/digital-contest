@extends('layout')
@section('title', 'Обратная связь')
@section('background')
    <video autoplay muted loop id="background">
        <source src="/dist/video/ArtNFT_Fon1_Gorizont.webm" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
@endsection
@section('content')
    <main class="d-flex flex-grow-1 align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 site_form">
                    <div class="row">
                        <p class="contact-form-title my-4">По какому вопросу хотите обратиться?
                            Уточните, к каким специалистам направить обращение</p>
                    </div>
                    <x-success-alert/>
                    <form method="POST" action="{{route('contact-form.store')}}">
                        @csrf
                        <div class="d-flex justify-content-start gap-4 mb-4">
                            <div class="d-flex flex-column gap-2">
                                <input class="form-check-input" type="radio" name="type" id="tech"
                                       value="Техническая поддержка">
                                <label class="form-check-label" for="tech">Техническая поддержка</label>
                            </div>
                            <div class="d-flex flex-column gap-2">
                                <input class="form-check-input" type="radio" name="type" id="question"
                                       value="Вопрос">
                                <label class="form-check-label" for="question">Вопрос</label>
                            </div>
                            <div class="d-flex flex-column gap-2">
                                <input class="form-check-input" type="radio" name="type" id="report"
                                       value="Жалоба">
                                <label class="form-check-label" for="report">Жалоба</label>
                            </div>
                        </div>

                        <!-- name -->
                        <div class="mb-3 row">
                            <label for="name"
                                   class="col-xl-3 col-xxl-2 col-form-label">{{ __('ФИО*') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="text" name="name" maxlength="55" class="form-control" id="name" required>
                                @error('name')
                                <p class="error"> {{$message}} </p>
                                @enderror
                                <p class="error mt-1">Укажите, как к Вам обращаться</p>
                            </div>
                        </div>

                        <!-- email -->
                        <div class="mb-3 row">
                            <label for="email"
                                   class="col-xl-3 col-xxl-2 col-form-label">{{ __('E-mail*') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="email" name="email" class="form-control" id="email" required>
                                @error('email')
                                <p class="error"> {{$message}} </p>
                                @enderror
                                <p class="error mt-1">Адрес для отправки ответа</p>
                            </div>
                        </div>

                        <!-- phone -->
                        <div class="mb-3 row">
                            <label for="phone"
                                   class="col-xl-3 col-xxl-2 col-form-label">{{ __('Телефон') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <input type="text" name="phone" class="form-control" id="phone" required>
                                @error('phone')
                                <p class="error"> {{$message}} </p>
                                @enderror
                                <p class="error mt-1">Контактный номер телефона (необязательно)</p>
                            </div>
                        </div>

                        <!-- content -->
                        <div class="mb-3 row">
                            <label for="content"
                                   class="col-xl-3 col-xxl-2 col-form-label">{{ __('Текст обращения*') }}</label>
                            <div class="col-xl-9 col-xxl-10">
                                <textarea name="content" class="form-control" id="content"
                                          required></textarea>
                                @error('content')
                                <p class="error"> {{$message}} </p>
                                @enderror
                                <p class="error mt-1">Подробно изложите ваш вопрос и все сопутствующие детали</p>
                            </div>

                        </div>

                        <!-- submit -->
                        <div class="row my-4">
                            <div>
                                <button type="submit" class="btn btn-danger ml-4">{{ __('Отправить') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

