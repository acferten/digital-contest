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

        return view('static.about_the_contest', compact('content'));
    }

    public function howToBecomeMember(): View
    {
        return view('static.how_to_become_a_member');
    }
}
