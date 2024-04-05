<?php

namespace App\Http\Requests;

use App\Exceptions\APIException;
use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'first_name' => 'required|string',
            'last_name' => 'string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'role_id' => 'integer|exists:roles,id'
        ];
    }
}
