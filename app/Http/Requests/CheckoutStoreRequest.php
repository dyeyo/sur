<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutStoreRequest extends FormRequest
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
            'bank_code' => 'required|numeric',
            'complete_name' => 'required',
            'person_type' => 'required|in:N,J',
            'identification_type' => 'required|in:CC,CE,NIT,TI,PP,IDC,CEL,RC,DE',
            'document_number' => 'required'
        ];
    }
}
