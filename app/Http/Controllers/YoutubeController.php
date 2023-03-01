<?php

namespace App\Http\Controllers;

use DateInterval;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function index()
    {
        return view('Yt.index');
    }


    // get ytvideoinfo
    public function getYoutubeVideinfo(Request $request)
    {
    
       $ytLink = $request->ytLink;
       $videoId = '';
        // Extract the video ID using regular expressions
        if (preg_match('/youtu\.be\/([^\?\/]+)/', $ytLink, $matches)) {
            $videoId = $matches[1];
        } else if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $ytLink, $matches)) {
            $videoId = $matches[1];
        }


        //handling the api by guzzle
        $client = new Client();
        $response = $client->get('https://www.googleapis.com/youtube/v3/videos',[
            'query' => [
                'id' => $videoId,
                'part' => 'contentDetails',
                'key' => 'AIzaSyA34E_DyuoQVhVgN91n_8FAMZsQiAFNMKE'
            ]
        ]);
  

        $json = json_decode($response->getBody(), true);
        $duration = $json['items'][0]['contentDetails']['duration'];
        // Assuming that $duration is set to "PT6M5S"
        $iso_duration = new DateInterval($duration);
        // $seconds = $iso_duration->s + ($iso_duration->i * 60);
        $seconds = $iso_duration->s + ($iso_duration->i * 60) + ($iso_duration->h * 3600);

        $friendly_duration = ($iso_duration->h > 0 ? gmdate("H:i:s", $seconds) : gmdate("i:s", $seconds))  . ' Sec';
        
        // return the duration
        if ($friendly_duration)
        {
            return response()->json([
                'status' => 200,
                'message'=> 'Successfully Done Calculate Video Duration',
                'duration' => $friendly_duration
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Invalid Video Duration',
                'duration' => 0
            ]);
        }
        

    }
}
