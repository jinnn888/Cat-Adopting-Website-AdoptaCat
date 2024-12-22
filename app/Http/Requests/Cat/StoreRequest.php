<?php

namespace App\Http\Requests\Cat;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            "name" => 'required|string|max:255',
            "breed" => 'required|string|max:255',
            "age" => "required|integer|min:0",
            "gender" => "required|in:male,female",
            "description" => "required|string",
            "temperament" => "required|string|max:255",
            "adoption_fee" => "required|numeric|min:0",
            "images" => 'required|array|min:1|max:5',
            "images.*" => 'image|mimes:jpeg,jpg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "The name field is required.",
            "breed.required" => "Please specify the breed of the pet.",
            "age.required" => "The age of the pet is required.",
            "age.integer" => "The age must be a valid number.",
            "age.min" => "The age must be at least 0.",
            "gender.required" => "Please specify the gender of the pet.",
            "gender.in" => "The gender must be either 'male' or 'female'.",
            "description.required" => "A description of the pet is required.",
            "temperament.required" => "Please describe the temperament of the pet.",
            "adoption_fee.required" => "The adoption fee is required.",
            "adoption_fee.numeric" => "The adoption fee must be a valid number.",
            "adoption_fee.min" => "The adoption fee must be at least 0.",
            "images.required" => "Please upload at least one image of the pet.",
            "images.array" => "The images must be an array.",
            "images.min" => "You must upload at least one image.",
            "images.max" => "You can upload a maximum of 5 images.",
            "images.*.image" => "Each file must be an image.",
            "images.*.mimes" => "Each image must be of type: JPEG, JPG, or PNG.",
            "images.*.max" => "Each image must not exceed 2MB in size.",
        ];
    }

    
}
