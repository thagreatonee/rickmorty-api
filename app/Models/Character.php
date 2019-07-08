<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{

    public function extractIds($data)
    {
        $transformedData = array_map(function ($data) {
            return preg_replace("/[^0-9]/", "", $data);
        }, $data);

        return $transformedData;
    }

    public function processQuery($queryParameter, $apiData)
    {
        $parameters         = explode(",", $queryParameter);
        $lengthOfParameters = count($parameters);

        if ($lengthOfParameters && $lengthOfParameters > 0) {
            return $this->sort($parameters[0], $apiData);
        }

        return "false";
    }

    public function sort($parameter, $apiData)
    {
        $collection = collect($apiData);
        if($parameter == 'name' || $parameter == 'gender') { }
        $sorted = $collection->sortBy($parameter);

        return $sorted->values()->all();
    }

    public function sortByDesc($parameter)
    { }
}
