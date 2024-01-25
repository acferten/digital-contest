<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Domain\Products\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function edit(Product $product): View
    {
        $data = [
            'product' => $product,
        ];

        return view('products.edit', $data);
    }

    public function update(Product $product, Request $request): View
    {
        $request->validate([
            'price' => 'required|int|max:2000',
        ]);

        $product->update([
            'price' => $request->input('price'),
        ]);

        return view('main');
    }
}
