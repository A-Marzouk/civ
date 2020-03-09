<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Project extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // here I can customize my return array. now it returns all data from the Skill model.
    }

    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'author_url' => url('https://civ.ie'),
        ];
    }
}
