<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'=>['required','min:3'],
            'description'=>['required','min:10'],
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Please enter title\'s name more than 3 char & non-repeated.',
            'description.required'=>'Please enter description\'s name more than 10 char.',
        ];
    }
}
