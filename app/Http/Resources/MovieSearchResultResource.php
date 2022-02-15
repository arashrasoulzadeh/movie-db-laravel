<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieSearchResultResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
            [
                'id'    =>  $this->getId(),
                'type'  =>  $this->getType(),
                'year'  =>  $this->getYear(),
                'title' =>  $this->getTitle(),
                'poster' =>  $this->getPoster()->getPath()
            ];
    }
}
