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
    public function show(Request $request){
        $status_code        = 200;
        $episode            = null;
        $client             = new Client(['http_errors' => false]);
        $response           = $client->get($this->url);
        $episodeTransformer = new EpisodeTransformer();

        $json       = json_decode($response->getBody()->getContents(), true);
        $episode    = $episodeTransformer->transform($json['results']);

        if($episode == null){
            $episode        = "Failed to make request";
            $status_code    = 500;
        }

        return response()->json($episode,$status_code);
    }
}
