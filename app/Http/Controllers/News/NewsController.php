<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Domain\News\DataTransferObjects\NewsData;
use Domain\News\Models\News;
use Domain\Prize\Models\Prize;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $data = [
            'news' => News::all()->sortByDesc('publication_date'),
        ];

        return view('news.news', $data);
    }

    public function create(): View
    {
        return view('news.add_news');
    }

    public function store(NewsData $data): RedirectResponse
    {
        $news = News::create([
            ...$data->all(),
            'publication_date' => now(),
        ]);

        return Redirect::route('news.show', $news);
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

    public function edit(News $news): View
    {
        $data = [
            'news' => $news,
        ];

        return view('news.edit_news', $data);
    }

    public function update(NewsData $data, News $news): RedirectResponse
    {
        $news->update([
            ...$data->all(),
            'publication_date' => now(),
        ]);

        return Redirect::route('news.show', $news);
    }

    public function delete(News $news): View
    {
        return view('news.delete', compact('news'));
    }

    public function destroy(News $news): RedirectResponse
    {
        $news->delete();

        return Redirect::route('news.index')->with('success', 'Новость успешно удалена');
    }
}
