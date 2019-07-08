<?php

namespace App\Transformer;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Comment;
class EpisodeTransformer extends Model
{
    /**
     * @param $data
     * @return mixed
     */
    public function transform($data){
        $convertDataToCollection = collect($data);

        $transformedData = $convertDataToCollection->map(function ($item, $key) {
            $comment_count          = Comment::where('episode_id',$item['id'])->count();
            $item['created']        = Carbon::parse($item['created'])->format('d-m-Y h:i:s A');
            $item['comment_count']  = $comment_count;
            return $item;
        })->sortBy('created')->values()->all();

        return $transformedData;
    }
}
