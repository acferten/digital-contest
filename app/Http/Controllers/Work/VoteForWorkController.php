<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use Domain\Work\Models\Work;
use Illuminate\Support\Facades\Redirect;

class VoteForWorkController extends Controller
{
    public function __invoke(Work $work)
    {
        $work->votes()->save(auth()->user());

        return Redirect::back();
    }
}
