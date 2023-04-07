<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Services\ApiService;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::query()->where('status', 1)
            ->take(12)
            ->orderByDesc('created_at')
            ->with('technologies')
            ->get();

        ApiService::_success($portfolios);
    }


    public function all()
    {
        $portfolios = Portfolio::query()->where('status', 1)
            ->orderByDesc('created_at')
            ->with('technologies')
            ->get();

        ApiService::_success($portfolios);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $portfolio = Portfolio::query()->where('id', $id)->with(['technologies', 'galleries'])->firstOrFail();
        return  ApiService::_success($portfolio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
