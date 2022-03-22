<?php

namespace App\Http\Controllers\Admin;

use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Services\MediaFileService;
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
        $categories = Article::query()->orderByDesc('created_at')->get();


        ApiService::_success($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if ($request->file('file')) {

            $request->merge(['media_id' => MediaFileService::publicUpload($request->file)->id]);
        }

        $tags = json_decode($request->tags);

        $tags = collect($tags)->map(function ($tag) {
            return $tag->id;
        });

        $article =  Article::query()->create([
            'title' => $request->title,
            'description' => $request->description,
            'media_id' => $request->media_id,
            'category_id' => $request->category_id,
            'is_published' => $request->is_published,
        ]);

        $article->tags()->sync($tags);

        return ApiService::_success("article created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::query()->where('id', $id)->with('tags')->first();

        return ApiService::_success($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $article = Article::query()->where('id', $request->id)->first();


        if ($request->file('file')) {
            $request->merge(['media_id' => MediaFileService::publicUpload($request->file)->id]);
            if ($article->media) $article->media->delete();
        } else {
            $request->merge(['media_id' => $article->media_id]);
        }

        $tags = json_decode($request->tags);

        $tags = collect($tags)->map(function ($tag) use ($request) {
            return $tag->id;
        });

        $article->update([
            'title' => $request->title,
            'description' => $request->description,
            'media_id' => $request->media_id,
            'category_id' => $request->category_id,
            'is_published' => $request->is_published,
        ]);

        $article->tags()->sync($tags);

        return ApiService::_success("article updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::query()->where('id', $id)->first();

        $article->delete();

        return ApiService::_success("article deleted successfully");
    }
}
