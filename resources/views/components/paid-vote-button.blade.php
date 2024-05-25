@props(['work'])

@auth('sanctum')
    @if(!auth()->user()->hasReachedVotesLimit($work))
    <div class="col">
        <form action="{{route('paid_voting_confirmation', $work)}}" method="get">
            <button type="submit" id='start-payment-button' class="btn btn-danger float-end">Голосовать</button>
        </form>
    </div>
    @else
        <div class="row w-100">
            <a href="{{route('gallery')}}" class="btn btn-danger float-end">На сегодня Вы достигли лимита голосов за эту работу</a>
        </div>
    @endif

@endauth
