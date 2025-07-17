<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMaterialsorder extends FormRequest
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
            'MaterialID' => 'required',
            'MaterialName' => 'required',
            'Price' => 'required|numeric|min:1',
            'Measure' => 'required|string|max:50',
            'Quantity' => 'required|integer|min:1',
            'Description' => 'nullable|string|max:500',
            'Status' => 'nullable|boolean',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'MaterialID.required' => 'Material ID is required.',
            'MaterialID.integer' => 'Material ID must be an integer.',
            'MaterialID.unique' => 'Material ID must be unique.',
            'MaterialName.required' => 'Material Name is required.',
            'MaterialName.string' => 'Material Name must be a string.',
            'MaterialName.max' => 'Material Name cannot exceed 255 characters.',
            'Price.required' => 'Price is required.',
            'Price.numeric' => 'Price must be a number.',
            'Price.min' => 'Price must be at least 0.',
            'Measure.required' => 'Measure is required.',
            'Measure.string' => 'Measure must be a string.',
            'Measure.max' => 'Measure cannot exceed 50 characters.',
            'Quantity.required' => 'Quantity is required.',
            'Quantity.integer' => 'Quantity must be an integer.',
            'Quantity.min' => 'Quantity must be at least 1.',
            'Description.string' => 'Description must be a string.',
            'Description.max' => 'Description cannot exceed 500 characters.',
            'Status.boolean' => 'Status must be true or false.',
        ];
    }
}