<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\StoreRequest;
use App\Http\Requests\News\UpdateRequest;
use App\Models\News;
use App\Services\NewsService;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class NewsController extends Controller
{
    use AuthorizesRequests;

    public function __construct(
        private NewsService $newsService
    )
    {
    }

    public function create()
    {
        $this->authorize('create', News::class);
        return view('pages.news.create');
    }

    public function show(News $news)
    {
        return view('pages.news.show', compact('news'));
    }

    public function store(StoreRequest $request)
    {
        $this->authorize('create', News::class);

        try {
            $this->newsService->create($request);
            return redirect()->route('home')->with('success', 'Новость успешно добавлена');
        } catch (Exception $e) {
            return redirect()->route('home')->with('error', 'Не удалось добавить новость. Пожалуйста, повторите попытку позже!'. $e->getMessage());
        }
    }

    public function edit(News $news)
    {
        $this->authorize('update', $news);

        return view('pages.news.edit', compact('news'));
    }

    public function update(News $news, UpdateRequest $request)
    {
        $this->authorize('update', $news);

        try {
            $news = $this->newsService->update($request, $news);
            return redirect()->route('news.show', $news)->with('warning', 'Новость отредактирована');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Ошибка при редактировании новости');
        }

    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('home')->with('warning', 'Новость удаленна');
    }
}
