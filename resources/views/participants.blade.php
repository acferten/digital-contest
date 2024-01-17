@extends('layout')
@section('title', 'Участники')
@section('body_type', 'background_type5')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Участники</h1>
                </div>
            </div>

            <div class="participants">
                <ul class="letters">
                    @foreach($letters as $letter)
                        <li><a href="javascript:void(0);" data-letter="{{$letter->letter}}" class="js-participants_filter">{{$letter->letter}}</a></li>
                    @endforeach
                </ul>
                <div class="row">
                    @foreach($user_group as $letter => $users)
                        <div class="col-md-4 col-12 title js-participants_item" data-letter="{{$letter}}">
                            <div class="letter">{{$letter}}</div>
                            <ul class="titles">
                                @foreach($users as $user)
                                    <li>{{$user->nickname}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    @if(false)
    <script>
        $(document).ready(function(){
            $(".js-participants_filter").on("click", function() {
                let _this = $(this),
                    value = _this.data("letter").toLowerCase();
                if (_this.hasClass("active")) {
                    _this.removeClass("active");
                    $(".js-participants_item").show();
                } else {
                    $(".js-participants_filter").removeClass("active");
                    _this.addClass("active");
                    $(".js-participants_item").filter(function() {
                        $(this).toggle($(this).data("letter").toLowerCase() == value);
                    });
                }
            });
        });
    </script>
    @endif
@endsection
