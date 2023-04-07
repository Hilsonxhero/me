<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditorUploadController extends Controller
{
    public function upload(Request $request)
    {
        $image = $request->file('file');

        $image_name = Str::random(15) . '.' . $image->getClientOriginalExtension();

        $image_dir = public_path() . '/images/posts/';

        $image->move($image_dir, $image_name);

        ApiService::_success(asset('/images/posts/' . $image_name));
    }
}
