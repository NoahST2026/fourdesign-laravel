<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
{
    return true;
}

public function rules(): array
{
    return [
        'title' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string'],
        'url' => ['nullable', 'url'],
        'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
    ];
}



}
