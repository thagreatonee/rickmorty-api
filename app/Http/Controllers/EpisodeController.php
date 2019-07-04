<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformer\EpisodeTransformer;
use \GuzzleHttp\Client;

class EpisodeController extends Controller
{
    protected $url = 'https://rickandmortyapi.com/api/episode';

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function episodes(Request $request)
    {
        //we want to sort the episodes from ascending to descending
        $status_code        = 200;
        $episode            = null;
        $client             = new Client(['http_errors' => false]);
        $response           = $client->get ($this->url);
        $episodeTransformer = new EpisodeTransformer();

        //decode json response
        $json       = json_decode($response->getBody()->getContents(), true);
        //transform episode and sort by date
        $episode    = $episodeTransformer->transform($json['results']);

        //check if the data returned exists then disable
        if($episode == null){
            $episode        = "Failed to make request";
            $status_code    = 500;
        }

        //add comment to each episode based on a predefined url.

        return response()->json($episode,$status_code);
    }
}
