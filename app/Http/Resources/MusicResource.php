<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MusicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'singer_id' => $this->category_id,
            'name' => $this->name,
            'year' => number_format($this->year),
            'singer' => ($this->singer) ? new SingerResource($this->singer) : NULL,
        ];
    }
}
