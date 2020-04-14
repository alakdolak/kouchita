<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StreamingController extends Controller
{
    public function indexStreaming()
    {
        return view('streaming.streamingIndex');
    }

    public function showStreaming()
    {
        return view('streaming.streamingShow');
    }
}
