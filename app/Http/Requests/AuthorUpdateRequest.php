<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'birth' => 'sometimes|required|date',
            'biography' => 'nullable|string|max:1024'
        ];
    }
}
