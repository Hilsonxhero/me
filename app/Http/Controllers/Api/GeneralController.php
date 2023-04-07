<?php

namespace App\Http\Controllers\Api;

use App\Models\Setting;
use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
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
}
