<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vimeo\Laravel\Facades\Vimeo;

class VimeoController extends Controller
{
    //
    public function uploadvideo(Request $request)
    {
        $client = new \Vimeo\Vimeo("client_id", "client_secret", "access_token");
        $uri = $client->upload($request->file('video')->getPathName(), array(
            'name' => $request->file('video')->getClientOriginalName()
        ));
        $video_data = $client->request($uri . '?fields=link');
        $video_link = $video_data['body']['link'];
        return $video_link;
    }
}
