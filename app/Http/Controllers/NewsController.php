<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
	{
		$news = $this->getNews();
		//list all news
		return view('news.index', [
			'newsList' => $news
		]);
	}

	public function show(int $id)
	{
		// return current news
		$news = $this->getNews($id);
		return view('news.show', [
			'news' => $news
		]);
	}
}

