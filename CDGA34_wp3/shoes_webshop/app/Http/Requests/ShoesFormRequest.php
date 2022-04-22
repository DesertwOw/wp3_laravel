<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShoesFormRequest extends FormRequest
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
            'model_name' => [
                    'required',
                    'max:255'
            ],
            'manufacturer_brand' => [
                'required',
                'max:255'
            ],
            'size' => [
                'required',
                'max:255'
            ],
            'price' => [
                'required',
                'max:255'
            ],
            'gender' => [
                'required',
                'max:255'
            ]
        ];
    }
}
