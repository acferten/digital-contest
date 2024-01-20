<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Domain\News\DataTransferObjects\NewsData;
use Domain\News\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $data = [
            'news' => News::all(),
        ];

        return view('news.news', $data);
    }

    public function create(): View
    {
        return view('news.add_news');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(NewsData::rules());
        $data = NewsData::fromRequest($request);

        News::create([
            ...$data->all(),
            'publication_date' => now()
        ]);

        return Redirect::route('news.index');
    }

    public function show(News $news): View
    {
        $next = News::where('publication_date', '>', $news->publication_date)
            ->oldest('publication_date')
            ->first();
        $prev = News::where('publication_date', '<', $news->publication_date)
            ->latest('publication_date')
            ->first();

        return view('news.news_card', ['news' => $news, 'next' => $next, 'prev' => $prev]);
    }

    public function edit(string $id)
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
