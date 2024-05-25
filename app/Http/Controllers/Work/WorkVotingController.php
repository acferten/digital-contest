<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use Domain\Products\Enums\ProductEnum;
use Domain\Products\Models\Product;
use Domain\Work\DataTransferObjects\WorkVoteData;
use Domain\Work\Models\Work;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class WorkVotingController extends Controller
{
    public function confirmFreeVoting(Work $work): View
    {
        return view('works.voting-confirmation', compact('work'));
    }

    public function confirmPaidVoting(Work $work): View
    {
        $price = Product::where('name', ProductEnum::Voting)->first()->price;
        return view('works.paid-voting-confirmation', compact('work', 'price'));
    }

    public function vote(WorkVoteData $data): RedirectResponse
    {
        throw_if(auth()->user()->hasVotedToday(), new \Exception('Ежедневный бесплатный голос уже был потрачен. Можете проголосовать завтра или платно.'));

        $data->work->votes()->save(auth()->user());

        return Redirect::route('works.show', $data->work)->with('success', 'Вы успешно проголосовали за работу!');
    }
}
