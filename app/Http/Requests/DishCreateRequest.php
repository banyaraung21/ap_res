<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishCreateRequest extends FormRequest
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
            'name' => "required",
            'category' => "required",
            'dish_image' => "required|image",
        ];
    }
}
