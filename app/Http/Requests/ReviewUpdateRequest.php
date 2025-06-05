<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'note' => 'sometimes|required|integer|min:1|max:5',
            'text' => 'nullable|string|max:1024',
            'book_id' => 'sometimes|required|exists:books,id',
            'client_id' => 'sometimes|required|exists:clients,id'
        ];
    }
}
