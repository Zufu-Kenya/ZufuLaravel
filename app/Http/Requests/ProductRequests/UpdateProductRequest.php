<?php

namespace App\Http\Requests\ProductRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric|max:9999999999',
            'quantity' => 'sometimes|required|numeric|max:9999999999',
            'condition_id' => 'sometimes|required|exists:conditions,id',
            'brand_id' => 'sometimes|required|exists:brands,id',
            'images.*' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
