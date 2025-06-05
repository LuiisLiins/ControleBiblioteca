<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\GenderResource; // vamos adicionar gender também

class BookResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'title' => $this->title,
            'sinopse' => $this->sinopse,
            'gender_id' => $this->gender_id,
            'author_id' => $this->author_id,
        ];
    }
}
