<?php

namespace App\Http\Controllers\Admin;

use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WorkExperience;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = WorkExperience::query()->orderByDesc('created_at')->get();
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

        $experience =  WorkExperience::query()->create([
            'title' => $request->title,
            'description' => $request->description,
            'label' => $request->label,
            'date' => $request->date,
            'location' => $request->location,
        ]);

        return ApiService::_success("experience created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $experience = WorkExperience::query()->where('id', $id)->first();

        return ApiService::_success($experience);
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
        $experience = WorkExperience::query()->where('id', $request->id)->first();

        $experience->update([
            'title' => $request->title,
            'description' => $request->description,
            'label' => $request->label,
            'date' => $request->date,
            'location' => $request->location,
        ]);

        return ApiService::_success("experience updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience = WorkExperience::query()->where('id', $id)->first();

        $experience->delete();

        return ApiService::_success("experience deleted successfully");
    }
}
