<?php

namespace App\Http\Controllers\Api;

use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::query()->where('is_published', 1)
            ->take(6)
            ->orderByDesc('created_at')
            ->with('tags')
            ->get();

        ApiService::_success($articles);
    }


    public function all()
    {
        $articles = Article::query()->where('is_published', 1)
            ->orderByDesc('created_at')
            ->with('tags')
            ->get();

        ApiService::_success($articles);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $article = Article::query()->where('id', $id)->with(['tags'])->firstOrFail();
        $related_articles = Article::with('tags')
            ->where('id', '!=', $article->id)
            ->where('category_id', $article->category_id)
            ->inRandomOrder()
            ->take(3)
            ->get();
        $data = [
            'data' => $article,
            'related_articles' => $related_articles

        ];
        return  ApiService::_success($data);
    }
}
