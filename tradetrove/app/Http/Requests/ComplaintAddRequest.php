<?php

namespace App\Http\Requests;

use App\Exceptions\APIException;
use App\Models\Complaint;
//use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintAddRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        $user = Auth::user();
        if (!$request)
            return false;
        return !Complaint::where(['user_id' => $user->id, 'post_id' => $request->input('post_id')])->first();

//        if ($user->hasRole(['admin'])) {
//            if ($request->role_id == 1) {
//                return true;
//            } else {
//                return false;
//            }
//        } else if ($user->hasRole(['teacher'])){
//            if ($request->role_id == 2) {
//                return true;
//            } else {
//                return false;
//            }
//        }
//        return false;
    }

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
    protected function failedAuthorization()
    {
        throw new APIException(403, "Forbidden. You have already complained this post");
    }
}
