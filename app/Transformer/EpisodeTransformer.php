<?php

namespace App\Transformer;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class EpisodeTransformer extends Model
{
    /**
     * @param $data
     * @return mixed
     */
    public function transform($data){
        $convertDataToCollection = collect($data);

        $transformedData = $convertDataToCollection->map(function ($item, $key) {
            $item['created'] = Carbon::parse($item['created'])->format('d-m-Y h:i:s A');
            return $item;
        })->sortBy('created')->values()->all();

        return $transformedData;
    }
}
