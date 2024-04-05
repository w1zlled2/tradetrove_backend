<?php

namespace App\Http\Controllers;

use App\Exceptions\APIException;
use App\Http\Requests\UserAddRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return new UserCollection(User::all());
    }

    public function store(UserAddRequest $request)
    {
        if ($request->role_id) {
            return User::create($request->all());
        } else {
            return User::create($request->all() + ['role_id' => 3]);
        }

    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(Request $request, User $user)
    {
        return "Изменение пользователя";
    }

    public function destroy(User $user)
    {
        return "Удаление пользователя";
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $user = User::where([
            'email' => $request->email,
        ])->first();
        if (!Hash::check($request->password, $user->password)) {
            throw new APIException(401, 'Authentication failed');
        }

//        $user = User::where([
//            'email' => $request->email,
//            'password' => $request->password,
//        ])->first();
//        if (!$user) {
//            throw new APIException(401, 'Authentication failed');
//        }

        return response()->json([
            'data' => [
                'user_token' => $user->generateToken(),
            ]
        ]);
    }

    public function logout()
    {
        Auth::user()->logoutToken();
        return [
            'data' =>
                [
                    'message' => 'logout',
                ]
        ];
    }

//    public function register()
//    {
//        return "Регистрация";
//    }

    public function changeRole(User $user)
    {
        return "Изменение прав доступа";
    }

    public function publishingBlock(User $user)
    {
        if ($user) {
            $user->update(['publishing_banned' => true]);
        }
        return $user;
    }

    public function publishingUnlock(User $user)
    {
        if ($user) {
            $user->update(['publishing_banned' => false]);
        }
        return $user;
    }
}
