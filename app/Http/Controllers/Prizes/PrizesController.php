<?php

namespace App\Http\Controllers\Prizes;

use App\Http\Controllers\Controller;
use Domain\Prize\DataTransferObjects\PrizeData;
use Domain\Prize\Models\Prize;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PrizesController extends Controller
{
    public function index(): View
    {
        $data = [
            'prizes' => Prize::orderBy('importance')->get(),
        ];

        return view('prizes.index', $data);
    }

    public function create(): View
    {
        return view('prizes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = PrizeData::validateAndCreate($request);

        Prize::create([
            ...$data->all(),
            'photo' => $data->photo->storePublicly('', 'prizes_photo'),
        ]);

        return Redirect::route('prizes.index')->with('success', 'Приз успешно добавлен');
    }

    public function edit(Prize $prize): View
    {
        return view('prizes.edit', compact('prize'));
    }

    public function update(Request $request, Prize $prize): RedirectResponse
    {
        $request->validate([
            'description' => 'required|string',
            'title' => 'required|string|max:30',
            'importance' => 'required|integer|unique:prizes,importance',
        ]);

        $data = PrizeData::fromRequest($request);

        $prize->update([
            ...$data->all(),
            'photo' => $data->photo ?
                $data->photo->storePublicly('', 'prizes_photo')
                : $prize->photo,
        ]);

        return redirect()->route('prizes.index')->with('success', 'Succeed');
    }

    public function delete(Prize $prize): View
    {
        return view('prizes.delete', compact('prize'));
    }

    public function destroy(Prize $prize): RedirectResponse
    {
        $prize->delete();

        return Redirect::route('prizes.index')->with('success', 'Приз успешно удален');
    }
}
