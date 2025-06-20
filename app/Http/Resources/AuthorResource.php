<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BookResource;

class AuthorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'name' => $this->name,
            'birth' => $this->birth,
            'biography' => $this->biography,
            'books' => BookResource::collection($this->whenLoaded('books'))
        ];
    }
}
