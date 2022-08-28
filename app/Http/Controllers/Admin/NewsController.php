<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(NewsQueryBuilder $builder)
    {
		return view('admin.news.index', [
			'newsList' => $builder->getNews()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
		return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param NewsQueryBuilder $builder
     * @return RedirectResponse
     */
    public function store(
        Request $request,
        NewsQueryBuilder $builder
    ): RedirectResponse {

        $news = $builder->create(
            $request->only(['category_id',
                'title', 'author', 'status', 'image', 'description'])
        );

        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Some text";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(News $news)
    {
        $categories = Category::all();
		return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @param NewsQueryBuilder $builder
     * @return RedirectResponse
     */
    public function update(
        Request $request,
        News $news,
        NewsQueryBuilder $builder
    ): RedirectResponse {
        if($builder->update($news, $request->only(['category_id',
            'title', 'author', 'status', 'image', 'description']))) {
            return redirect()->route('admin.news.index')
                    ->with('success', 'Запись успешно обновлена');

        }

        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return Response
     */
    public function destroy(News $news)
    {

    }
}
