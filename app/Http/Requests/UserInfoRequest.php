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
            'user_id' => ['integer', 'required'],
            'name' => ['string', 'max:30', 'nullable'],
            'pronouns' => ['string', 'max:20', 'nullable'],
            'avatar' => ['image:jpg, jpeg, png', 'nullable'],
            'goal' => ['string', 'max:150', 'nullable'],
            'social1' => ['url', 'nullable'],
            'social2' => ['url', 'nullable'],
            'social3' => ['url', 'nullable'],
            'age' => ['min:1', 'max:99', 'nullable'],
            'job' => ['string', 'max:50', 'nullable'],
            'fav-food' => ['string', 'max:30', 'nullable'],
            'least-fav-food' => ['string', 'max:30', 'nullable'],
        ];
    }
}
