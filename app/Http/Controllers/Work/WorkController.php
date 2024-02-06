<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use Domain\Products\Enums\ProductEnum;
use Domain\Products\Models\Product;
use Domain\Work\Actions\CreateWorkAction;
use Domain\Work\DataTransferObjects\WorkData;
use Domain\Work\Enums\WorkStatus;
use Domain\Work\Models\Genre;
use Domain\Work\Models\Work;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class WorkController extends Controller
{
    public function index(): View
    {
        $works = Work::where('status', WorkStatus::Published)->paginate(12);
        $categories = Genre::whereHas('works', function (Builder $query) {
            $query->where('status', '=', WorkStatus::Published);
        })->paginate(12);

        return view('works.gallery', compact('works', 'categories'));
    }

    public function create(): View
    {
        $data = [
            'genres' => Genre::all(),
            'price' => Product::where('name', ProductEnum::Publish->value)->first()->price,
        ];

        return view('works.add_work', $data);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(WorkData::rules());
        $data = WorkData::fromRequest($request);

        $work = CreateWorkAction::execute($data);

        $product = Product::where('name', ProductEnum::Publish->value)->first();
        $merchant_login = env('ROBOKASSA_LOGIN');
        $password_1 = env('ROBOKASSA_PASSWORD_1');
        $description = ProductEnum::Publish->value;
        $out_sum = $product->price;
        $user_id = auth()->user()->id;
        $inv_id = (int)(((int)($work->id . $user_id . time())) / 10000);
        $signature_value = md5("{$merchant_login}:{$out_sum}:{$inv_id}:{$password_1}:Shp_ProductId={$product->id}:Shp_UserId={$user_id}:Shp_WorkId={$work->id}");

        return Redirect::away("https://auth.robokassa.ru/Merchant/Index.aspx?MerchantLogin={$merchant_login}&OutSum={$out_sum}&InvId={$inv_id}&Description={$description}&SignatureValue={$signature_value}&Shp_ProductId={$product->id}&Shp_UserId={$user_id}&Shp_WorkId={$work->id}&IsTest=1");
    }

    public function show(Work $work): View
    {
        $data = [
            'work' => $work,
            'other_works' => $work->user->works->take(6),
        ];

        return view('works.work', $data);
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
