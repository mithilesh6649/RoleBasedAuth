<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoUploadController extends Controller
{
    public function uploadView()
    {
        return view('upload');
    }


    public function upload(Request $request)
    {

        // Validate the video file
        $request->validate([
            'video' => 'required|mimes:mp4,avi,mkv|max:204800' // max 200MB
        ]);

        // Store the video file
        $path = $request->file('video')->store('videos', 'public');

        // Respond with a success message or data
        return response()->json(['path' => $path, 'message' => 'Video uploaded successfully']);
    }
}
