<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use Domain\Work\Actions\CreateWorkAction;
use Domain\Work\DataTransferObjects\WorkData;
use Domain\Work\Models\Genre;
use Domain\Work\Models\Work;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class WorkController extends Controller
{
    public function index(): View
    {
        $data = [
            'works' => Work::all(),
        ];

        return view('gallery', $data);
    }

    public function create(): View
    {
        $data = [
            'genres' => Genre::all(),
        ];

        return view('profile.add_work', $data);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(WorkData::rules());
        $data = WorkData::fromRequest($request);

        CreateWorkAction::execute($data);

        return Redirect::route('gallery');
    }

    public function show(Work $work): View
    {
        $data = [
            'work' => $work,
            'other_works' => $work->user->works,
        ];

        return view('work', $data);
    }

    public function edit(string $id): View
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
