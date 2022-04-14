<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['sometimes', 'string', 'max:255', Rule::unique('products')->ignore($this->product)],
            'description' => ['sometimes', 'string', 'max:255'],
            'sku' => ['sometimes', 'string', 'max:255', Rule::unique('products')->ignore($this->product)],
            'in_stock' => ['sometimes', 'boolean'],
            'price' => ['sometimes', 'integer'],
        ];
    }
}
