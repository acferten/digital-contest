<?php

namespace App\Http\Requests\Work;

use Illuminate\Foundation\Http\FormRequest;

class WorkSearchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'search' => ['nullable', 'string', 'max:255'],
            'category' => ['nullable', 'int', 'exists:genres,id'],
        ];
    }
}
