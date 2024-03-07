<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Domain\News\DataTransferObjects\NewsData;
use Domain\News\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::all()->sortByDesc('publication_date');

        return view('news.index', compact('news'));
    }

    public function create(): View
    {
        return view('news.create');
    }

    public function store(NewsData $data): RedirectResponse
    {
        $news = News::create([
            ...$data->all(),
            'publication_date' => now(),
        ]);

        return Redirect::route('news.show', $news)->with('success', 'Новость успешно добавлена');
    }

    public function show(News $news): View
    {
        $next = News::where('publication_date', '>', $news->publication_date)
            ->oldest('publication_date')
            ->first();

        $prev = News::where('publication_date', '<', $news->publication_date)
            ->latest('publication_date')
            ->first();

        return view('news.show', compact(['next', 'prev', 'news']));
    }

    public function edit(News $news): View
    {
        return view('news.edit', compact('news'));
    }

    public function update(NewsData $data, News $news): RedirectResponse
    {
        $news->update([
            ...$data->all(),
            'publication_date' => now(),
        ]);

        return Redirect::route('news.show', $news)->with('success', 'Новость успешно обновлена');
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
