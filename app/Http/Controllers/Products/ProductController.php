<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Domain\Products\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    public function update(Product $product, Request $request): RedirectResponse
    {
        $request->validate([
            'price' => 'required|int|max:2000',
        ]);

        $product->update([
            'price' => $request->input('price'),
        ]);

        return redirect()->back()->with('success', 'Информация обновлена');
    }
}
