<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlantedProductRequest extends FormRequest
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
            'region_id' => 'required',
			'district_id' => 'required',
			'quarter_id' => 'required',
			'street_id' => 'required',
			'home_number' => 'required',
			'owner' => 'required',
        ];
    }

}
