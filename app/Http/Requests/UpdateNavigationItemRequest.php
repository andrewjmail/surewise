<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNavigationItemRequest extends FormRequest
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
            'name' => ['required'],
            'href' => ['required', 'url'],
            'order' => ['required', 'integer']
        ];
    }

    public function messages()
    {
        return [
            'href.required' => 'The link field is required.',
            'href.url' => 'The link format is invalid.',
        ];
    }
}
