@auth('sanctum')
    @role('admin')
    <div class="col">
        <x-admin-vote-button :$work/>
    </div>
@else
    @if(!auth()->user()->hasVotedToday())
        <div class="col">
            <x-free-vote-button :$work/>
        </div>
    @else
        <div class="col">
            <x-paid-vote-button :$work/>
        </div>
    @endif
    @endrole
@endauth
