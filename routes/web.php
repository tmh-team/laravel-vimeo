<?php

use App\Models\Video;
use Illuminate\Support\Facades\Route;
use Vimeo\Laravel\VimeoManager;

Route::get('/', function () {
    return view('video', [
        'videos' => Video::all()
    ]);
});

Route::post('/', function (VimeoManager $vimeo) {
    request()->validate([
        'title' => 'required',
        'description' => 'required',
        'video' => 'required|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime',
    ]);

    $path = $vimeo->upload(request()->file('video'));
    $path = explode('/', $path);
    $path = end($path);
    
    Video::create([
        'title' => request('title'),
        'description' => request('description'),
        'vimeo_video_id' => $path,
    ]);

    return back();
});
