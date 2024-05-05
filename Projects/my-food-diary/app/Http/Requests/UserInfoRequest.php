<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
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
            'real_name' => ['string', 'max:30'],
            'pronouns' => ['string', 'max:20'],
            'avatar' => ['url'],
            'goal' => ['string', 'max:150'],
            'social1' => ['url'],
            'social2' => ['url'],
            'social3' => ['url'],
            'age' => ['min:1', 'max:99'],
            'job' => ['string', 'max:50'],
            'favorite_food' => ['string', 'max:30'],
            'least_favorite_food' => ['string', 'max:30'],
        ];
    }
}
