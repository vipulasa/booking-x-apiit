<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotelRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'url' => 'required',
            'description' => 'required',
            'health_and_safety' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'website' => 'required',
        ];
    }
}
