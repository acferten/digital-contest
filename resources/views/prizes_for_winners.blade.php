@extends('layout')
@section('title', 'Призы победителям')
@section('body_type', 'background_type3')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Призы победителям</h1>
                </div>
            </div>
            <div class="prizes">
                <div class="row">
                    <div class="col-md-4 col-12 item">
                        <img src="/images/dest/first_place.jpg" alt="">
                        <div class="place first"><span>1.</span> Место</div>
                        <div class="description">sdjhlssdlfs sdgf dslgjh sdlg</div>
                    </div>
                    <div class="col-md-4 col-12 item">
                        <img src="/images/dest/second_place.jpg" alt="">
                        <div class="place"><span>2.</span> Место</div>
                        <div class="description">sdjhlssdlfs sdgf dslgjh sdlg</div>
                    </div>
                    <div class="col-md-4 col-12 item">
                        <img src="/images/dest/third_place.jpg" alt="">
                        <div class="place"><span>3.</span> Место</div>
                        <div class="description">sdjhlssdlfs sdgf dslgjh sdlg</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

