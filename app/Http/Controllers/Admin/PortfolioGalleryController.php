<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Services\MediaFileService;
use App\Http\Controllers\Controller;
use App\Models\PortfolioGallery;

class PortfolioGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $portfolio = Portfolio::query()->where('id', $id)->first();




        $media = $portfolio->galleries()->orderByDesc('created_at')->get();

        ApiService::_success($media);
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

        $portfolio = Portfolio::query()->where('id', $request->portfolio)->first();

        $portfolio->galleries()->create([
            'title' => $request->title,
            'status' => $request->status,
            'media_id' => $request->media_id,
        ]);

        return ApiService::_success("portfolio media created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd("ww");

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
        $media = PortfolioGallery::query()->where('id', $id)->first();

        if ($media->media) $media->media->delete();

        $media->delete();

        return ApiService::_success("portfolio deleted successfully");
    }
}
