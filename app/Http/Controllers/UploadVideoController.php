<?php

namespace App\Http\Controllers;

use App\Jobs\ConvertVideo;
use Illuminate\Http\Request;

class UploadVideoController extends Controller
{
    public function upload()
    {
        $file = request()->file('video');

        $file_path = '/storage/app/x.mp4';

        ConvertVideo::dispatch($file_path)->onConnection('database-convert-video');
    }
}
