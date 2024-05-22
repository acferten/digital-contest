<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use Domain\Work\DataTransferObjects\WorkVoteData;
use Domain\Work\Models\Work;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AddAdminVotesToWorkController extends Controller
{
    public function create(Work $work): View
    {
        return view('works.admin-vote', compact('work'));
    }

    public function store(WorkVoteData $data): RedirectResponse
    {
        for ($i = 0; $i < $data->amount; $i++) {
            $data->work->votes()->save(auth()->user());
        }

        return Redirect::route('works.show', $data->work)->with('success', 'Голоса успешно добавлены');
    }
}
