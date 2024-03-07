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
            'prizes' => Prize::all(),
        ];

        return view('prizes.prizes_for_winners', $data);
    }

    public function create(): View
    {
        return view('prizes.add_prize');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(PrizeData::rules());
        $data = PrizeData::fromRequest($request);

        Prize::create([
            ...$data->all(),
            'photo' => $data->photo->storePublicly('', 'prizes_photo'),
        ]);

        return Redirect::route('prizes.index');
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
