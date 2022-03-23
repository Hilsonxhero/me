<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Services\MediaFileService;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $setting = Setting::all();



        $setting = collect($setting)->map(function ($item) {
            return [
                'title' => $item->title,
                'value' => $item->value
            ];
        });

        ApiService::_success($setting);
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
        //
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
        if ($request->phone) {
            Setting::query()->updateOrCreate(
                ['title' => 'phone'],
                ['value' => $request->phone]
            );
        }
        if ($request->email) {
            Setting::query()->updateOrCreate(
                ['title' => 'email'],
                ['value' => $request->email]
            );
        }

        if ($request->about) {
            Setting::query()->updateOrCreate(
                ['title' => 'about'],
                ['value' => $request->about]
            );
        }

        if ($request->address) {
            Setting::query()->updateOrCreate(
                ['title' => 'address'],
                ['value' => $request->address]
            );
        }

        if ($request->instagram) {
            Setting::query()->updateOrCreate(
                ['title' => 'instagram'],
                ['value' => $request->instagram]
            );
        }

        if ($request->telegram) {
            Setting::query()->updateOrCreate(
                ['title' => 'telegram'],
                ['value' => $request->telegram]
            );
        }



        if ($request->file('file')) {
            $request->merge(['media' => MediaFileService::publicUpload($request->file)->files['original']]);
            Setting::query()->updateOrCreate(
                ['title' => 'logo'],
                ['value' => asset('storage/' . $request->media)]
            );
        } else {
        }


        ApiService::_success("setting updated successfully");
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
