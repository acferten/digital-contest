<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use App\Http\Requests\Work\WorkSearchRequest;
use Domain\Work\Enums\WorkStatus;
use Domain\Work\Models\Genre;
use Domain\Work\Models\Work;
use Illuminate\View\View;

class WorkSearchController extends Controller
{
    public function __invoke(WorkSearchRequest $request): View
    {
        $works = Work::where('status', WorkStatus::Published->value);

        if ($request->input('search')) {
            $works->where('title', $request->input('search'));
        }
        if ($request->input('category')) {
            $works->where('genre_id', $request->input('category'));
        }

        $data = [
            'works' => $works->paginate(12),
            'categories' => Genre::all(),
            'requested_category' => $request->input('category') ?
                $request->input('category') : null,
            'requested_title' => $request->input('search') ?
                $request->input('search') : null,
        ];

        return view('works.gallery', $data);
    }
}
