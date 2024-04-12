<?php

namespace App\Http\Requests;

use App\Exceptions\APIException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostAddRequest extends APIRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        $user = Auth::user();
        return !$user->publishing_banned;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'string|max:65535',
            'category_id' => 'required|integer|exists:categories,id',
            'address' => 'string|max:255',
            'price' => 'integer|nullable',
//            'condition_id' => 'required|integer|exists:conditions,id',
            'condition' => 'required|string|max:255',
            'files' => 'array',
            'connect_type' => 'required|string|exists:connect_types,code',
            'status_id' => 'integer|exists:statuses,id',
        ];
    }

    /**
     * @return mixed
     */
    protected function failedAuthorization()
    {
        throw new APIException(403, 'Forbidden. Your publishing option is blocked');
    }
}
