<?php

namespace App\Http\Controllers\Admin;

use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Services\MediaFileService;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Portfolio::query()->orderByDesc('created_at')->get();


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

        $technologies = json_decode($request->technologies);

        $technologies = collect($technologies)->map(function ($technology) use ($request) {
            return $technology->id;
        });

        $portfolio =  Portfolio::query()->create([
            'title' => $request->title,
            'web' => $request->web,
            'services' => $request->services,
            'description' => $request->description,
            'media_id' => $request->media_id,
            'category_id' => $request->category_id,
            'status' => $request->status,
        ]);

        $portfolio->technologies()->sync($technologies);

        return ApiService::_success("portfolio created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portfolio = Portfolio::query()->where('id', $id)->with('technologies')->first();

        return ApiService::_success($portfolio);
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
        $portfolio = Portfolio::query()->where('id', $request->id)->first();


        if ($request->file('file')) {
            $request->merge(['media_id' => MediaFileService::publicUpload($request->file)->id]);
            if ($portfolio->media) $portfolio->media->delete();
        } else {
            $request->merge(['media_id' => $portfolio->media_id]);
        }

        $technologies = json_decode($request->technologies);

        $technologies = collect($technologies)->map(function ($technology) use ($request) {
            return $technology->id;
        });

        $portfolio->update([
            'title' => $request->title,
            'web' => $request->web,
            'services' => $request->services,
            'description' => $request->description,
            'media_id' => $request->media_id,
            'category_id' => $request->category_id,
            'status' => $request->status,
        ]);


        $portfolio->technologies()->sync($technologies);

        return ApiService::_success("portfolio updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::query()->where('id', $id)->first();

        $portfolio->delete();

        return ApiService::_success("portfolio deleted successfully");
    }
}
