<?php

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Vimeo\Laravel\VimeoManager;

Route::get('/', function () {
    return view('video', [
        'videos' => []
    ]);
});

Route::post('/', function (Request $request, VimeoManager $vimeo) {
    request()->validate([
        'title' => 'required',
        'description' => 'required',
        'video' => 'required|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime',
    ]);

    $path =  $vimeo->upload(request()->file('video'));
    
    Video::create([
        'title' => request('title'),
        'description' => request('description'),
        'vimeo_video_id' => $path,
    ]);

    return back();
});
