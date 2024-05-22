<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use Domain\Work\DataTransferObjects\WorkVoteData;
use Domain\Work\Models\Work;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class WorkVotingController extends Controller
{
    public function confirm(Work $work): View
    {
        return view('works.voting-confirmation', compact('work'));
    }

    public function vote(WorkVoteData $data): RedirectResponse
    {
        throw_if(auth()->user()->hasVotedToday(), new \Exception('Ежедневный бесплатный голос уже был потрачен. Можете проголосовать завтра или платно.'));

        $data->work->votes()->save(auth()->user());

        return Redirect::route('works.show', $data->work)->with('success', 'Вы успешно проголосовали за работу!');
    }
}
