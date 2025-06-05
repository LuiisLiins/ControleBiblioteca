<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BookResource;
use App\Http\Resources\ClientResource;

class ReviewResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'note' => $this->note,
            'text' => $this->text,
            'book' => new BookResource($this->whenLoaded('book')),
            'client' => new ClientResource($this->whenLoaded('client'))
        ];
    }
}
