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
}
