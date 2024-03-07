<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use Domain\Shared\Models\Content;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function main(): View
    {
        return view('main');
    }

    public function about_the_contest(): View
    {
        $content = Content::where(['for' => 'about_the_contest'])->first();

        return view('about_the_contest', compact('content'));
    }

    public function how_to_become_a_member(): View
    {
        return view('how_to_become_a_member');
    }

    public function feedback(): View
    {
        return view('feedback');
    }
}
