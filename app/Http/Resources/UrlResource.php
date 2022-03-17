<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UrlResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request) :array
    {
        return [
            "destination" => $this->destination,
            "slug" => $this->slug,
            "updated_at" => $this->updated_at,
            "created_at" => $this->created_at,
            'id' => $this->id,
            'shortened_url' => $this->shorten_url
        ];
    }
}
