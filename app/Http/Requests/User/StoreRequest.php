<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'email' => 'required|unique:users,email,' . $this->id,
            'name' => 'required',
            'password' => 'required',
            'role' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('messages.user.validate.email_required'),
            'email.unique' => trans('messages.user.validate.email_unique'),
            'password.required' => trans('messages.user.validate.password_required'),
            'role.required' => trans('messages.user.validate.role_required'),
        ];
    }

    public function validated()
    {
        $paramValidated = $this->validator->validated();

        return $paramValidated;
    }
}