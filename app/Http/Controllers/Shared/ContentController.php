<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use Domain\Shared\Models\Content;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContentController extends Controller
{
    public function edit(Content $content): View
    {
        $data = [
            'content' => $content,
        ];

        return view('contents.edit', $data);
    }

    public function update(Content $content, Request $request): View
    {
        $content->update([
            'text' => $request->input('text'),
        ]);

        return view('main');
    }
}
