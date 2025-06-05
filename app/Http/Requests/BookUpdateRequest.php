<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'sinopse' => 'nullable|string|max:1024',
            'author_id' => 'sometimes|required|exists:authors,id',
            'gender_id' => 'sometimes|required|exists:genders,id'
        ];
    }
}
