<?php

namespace App\Http\Controllers\Partners;

use App\Http\Controllers\Controller;
use Domain\Partners\DataTransferObjects\PartnerData;
use Domain\Partners\Models\Partner;
use Domain\Shared\Models\Content;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PartnersController extends Controller
{
    public function index(): View
    {
        $data = [
            'partners' => Partner::all(),
            'content' => Content::where(['for' => 'partners'])->first(),
        ];

        return view('partners.index', $data);
    }

    public function create(): View
    {
        return view('partners.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(PartnerData::rules());
        $data = PartnerData::fromRequest($request);

        Partner::create([
            ...$data->all(),
            'logo' => $data->logo->storePublicly('', 'logos'),
        ]);

        return Redirect::route('partners.index')->with('success', 'Партнер успешно добавлен');
    }

    public function destroy(Partner $partner)
    {
        //
    }
}
