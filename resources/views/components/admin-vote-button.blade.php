@props(['work'])

@auth('sanctum')
    <div class="col">
        <form action="{{route('works.vote.admin.create', $work)}}" method="get">
            <button type="submit" id='start-payment-button' class="btn btn-danger float-end">Голосовать</button>
        </form>
    </div>
@endauth
