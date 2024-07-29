<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer'],
            'image' => ['required', 'image:jpg, jpeg, png'],
            'description' => ['required', 'max:255'],
            'recipe_name' => ['nullable', 'string', 'max:20', 'min:1'],
            'cooking_time' => ['nullable', 'integer', 'max:100', 'min:1'],
            'recipe_description' => ['nullable', 'string', 'max:255', 'min:10'],
        ];
    }
}
