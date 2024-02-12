<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            //
            'name' => 'required|min:5',
            'grade' => 'required',
            'email' => Rule::unique('students')->ignore($this->student), // Ensure email uniqueness except for the current student being updated
            'image' => 'nullable|image|max:10000', // Allow nullable image field for updates
        ];
    }
}
