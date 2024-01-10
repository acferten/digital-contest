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
        $data = [
            'text' => Content::where(['for' => 'about_the_contest'])->first(),
        ];

        return view('about_the_contest', $data);
    }

    public function how_to_become_a_member(): View
    {
        return view('how_to_become_a_member');
    }

    public function prizes_for_winners(): View
    {
        return view('prizes_for_winners');
    }

    public function partners(): View
    {
        return view('partners');
    }

    public function feedback(): View
    {
        return view('feedback');
    }
}
