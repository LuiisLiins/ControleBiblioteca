<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\GenderResource;

class ClientResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews'))
        ];
    }
}
