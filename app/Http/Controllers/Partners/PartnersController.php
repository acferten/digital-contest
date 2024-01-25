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

        return view('partners.partners', $data);
    }

    public function create(): View
    {
        return view('partners.add_partner');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(PartnerData::rules());
        $data = PartnerData::fromRequest($request);

        Partner::create([
            ...$data->all(),
            'logo' => $data->logo->storePublicly('', 'logos'),
        ]);

        return Redirect::route('partners.index');
    }

    public function show(Partner $partner)
    {
        //
    }

    public function edit(Partner $partner)
    {
        //
    }

    public function update(Request $request, Partner $partner)
    {
        //
    }

    public function destroy(Partner $partner)
    {
        //
    }
}
