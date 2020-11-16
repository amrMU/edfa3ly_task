<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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

        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            {
                return array();
            }
            case 'POST':
            {

                return [
                    'name_ar'=>'required',
                    'name_en'=>'required',
                    'content_en'=>'required',
                    'content_ar'=>'required',
                    'egp_price'=>'required|numeric',
                    'usd_price'=>'required|numeric',
                    'available_offers'=>['required',Rule::in(['none','pieces','percent'])],
                    'images.*'=>'required|mimes:jpeg,bmp,png,jpg',

                ];
            }
            case 'PUT':
            {
                return [
                    'name_ar'=>'required',
                    'name_en'=>'required',
                    'content_en'=>'required',
                    'content_ar'=>'required',
                    'egp_price'=>'required|numeric',
                    'usd_price'=>'required|numeric',
                    'available_offers'=>['required',Rule::in(['none','pieces','percent'])],
                    'images.*'=>'mimes:jpeg,bmp,png,jpg',
                ];
            }
            case 'PATCH':

        }
    }
}
