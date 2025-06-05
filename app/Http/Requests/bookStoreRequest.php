<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'sinopse' => 'nullable|string|max:1024',
            'author_id' => 'required|exists:authors,id',
            'gender_id' => 'required|exists:genders,id'
        ];
    }
}
