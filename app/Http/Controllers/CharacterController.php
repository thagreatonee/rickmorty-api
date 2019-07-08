<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;
use App\Models\Character;

class CharacterController extends Controller
{
    protected $characters_url   = 'https://rickandmortyapi.com/api/character';
    protected $episodes_url     = 'https://rickandmortyapi.com/api/episode';

    /**
     * @param $episode
     */
    public function show($episode, Request $request, Character $character){
        $apiData = $this->all($episode);

        if($request->input('sort') && !empty($request->input('sort')) && !empty($apiData)){
            return $character->processQuery($request->input('sort'), $apiData);
        }

        return response($apiData, 200);
    }


    /**
     * @param  $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * return lists of characters with their urls
     */
    public function getPerEpisode($id){
        $client                 = new Client(['http_errors' => false]);
        $getEpisode             = $client->get($this->episodes_url . '/' . $id);
        $getEpisodeCharacters   = json_decode($getEpisode->getBody()->getContents(), true);

        if ($getEpisodeCharacters && !empty($getEpisodeCharacters)) {
            $character  = new Character();
            //pull out the characters in the episode
            $characters = $character->extractIds($getEpisodeCharacters['characters']);

            if ($characters !== null || !empty($characters)) {
                return $characters;
            }
        }
        return null;
    }

    public function all($episode){
        $client                 = new Client(['http_errors' => false]);
        $charactersInEpisodeIds = $this->getPerEpisode($episode);
        $characterIds           = implode(',', $charactersInEpisodeIds);
        $getCharacters          = $client->get($this->characters_url . '/' . $characterIds);
        $characters             = json_decode($getCharacters->getBody()->getContents(), true);

        if ($characters) {
            return $characters;
        }
        return null;
    }
}
