<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'email' => 'required|unique:users,email,' . $this->user,
            'name' => 'required',
            'date_of_birth' => 'date|nullable',
            'role' => 'required',
            'sex' => 'required',
            'phone' => 'numeric|nullable',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:5012',
        ];
    }
}
