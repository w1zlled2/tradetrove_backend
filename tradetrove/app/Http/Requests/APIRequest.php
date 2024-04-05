<?php

namespace App\Http\Requests;

use App\Exceptions\APIException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class APIRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new APIException(422, 'Validation error', $validator->errors());
    }
//    public function authorize(): bool
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
