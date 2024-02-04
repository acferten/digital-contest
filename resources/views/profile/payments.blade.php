@extends('layout')
@section('title', 'Ваши оплаты')
@section('body_type', 'background_type6')
@section('content')
    <main class="flex-grow-1">
        <div class="container">
            <h1>Ваши оплаты</h1>
            @if($payments->isEmpty())
                <p>Оплат нет.</p>
            @else
                <ol>
                    @foreach($payments as $payment)
                        <li>{{ $payment->name }} «{{Domain\Work\Models\Work::find($payment->pivot->work_id)->title }}»
                            -- {{$payment->pivot->updated_at}}</li>
                    @endforeach
                </ol>
            @endif
        </div>
    </main>
@endsection
