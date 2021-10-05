<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|max:191|min:1',
            'price' => 'required|max:15000',
            'main_picture' => 'required',
//            'user_id' => 'max:50',
            'description' => 'string|max:1000',
            'images' => 'url'
        ];
    }
}
