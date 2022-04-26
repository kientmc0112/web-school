<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required|numeric',
            'date_of_birth' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required', [ 'attribute' => trans('label.name') ]),
            'email.required' => trans('validation.required', [ 'attribute' => trans('label.email') ]),
            'email.email' => trans('validation.email', [ 'attribute' => trans('label.email') ]),
            'telephone.required' => trans('validation.required', [ 'attribute' => trans('label.telephone') ]),
            'telephone.numeric' => trans('validation.numeric', [ 'attribute' => trans('label.telephone') ]),
            'date_of_birth.required' => trans('validation.required', [ 'attribute' => trans('label.date_of_birth') ]),
            'date_of_birth.date' => trans('validation.date', [ 'attribute' => trans('label.date_of_birth') ])
        ];
    }
}
