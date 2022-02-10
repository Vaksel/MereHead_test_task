<?php


namespace App\Http\Collections;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Http\Resources\GenreResource;


class GenreCollection extends ResourceCollection
{
    public $collects = GenreResource::class;

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return $this->resource->toArray();
    }
}