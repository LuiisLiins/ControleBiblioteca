<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'note' => 'required|integer|min:1|max:5',
            'text' => 'nullable|string|max:1024',
            'book_id' => 'required|exists:books,id',
            'client_id' => 'required|exists:clients,id'
        ];
    }
}
