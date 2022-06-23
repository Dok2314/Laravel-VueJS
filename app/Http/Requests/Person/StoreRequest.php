<?php

namespace App\Http\Requests\Person;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['string', 'required'],
            'age' => ['integer', 'required'],
            'job' => ['string', 'required'],
        ];
    }
}
