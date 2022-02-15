<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieSingleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
        "title"          =>   $this->resource->getTitle() ?? null,
        "year"           =>   $this->resource->getYear() ?? null,
        "rated"          =>   $this->resource->getRated() ?? null,
        "released"       =>   $this->resource->getReleased() ?? null,
        "runtime"        =>   $this->resource->getRuntime() ?? null,
        "genre"          =>   $this->resource->getGenre() ?? null,
        "director"       =>   $this->resource->getDirector() ?? null,
        "writer"         =>   $this->resource->getWriter() ?? null,
        "actors"         =>   $this->resource->getActors() ?? null,
        "plot"           =>   $this->resource->getPlot() ?? null,
        "language"       =>   $this->resource->getLanguage() ?? null,
        "country"        =>   $this->resource->getCountry() ?? null,
        "awards"         =>   $this->resource->getAwards() ?? null,
        "poster"         =>   $this->resource->getPoster()->getPath() ?? null,
        "metascore"      =>   $this->resource->getMetascore() ?? null,
        "imdbrating"     =>   $this->resource->getImdbrating() ?? null,
        "imdbvotes"      =>   $this->resource->getImdbvotes() ?? null,
        "imdbid"         =>   $this->resource->getImdbid() ?? null,
        "type"           =>   $this->resource->getType() ?? null,
        "totalseasons"   =>   $this->resource->getTotalseasons() ?? null,
        ];
    }
}
