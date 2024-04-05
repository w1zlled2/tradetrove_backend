<?php

namespace App\Http\Controllers;

require_once __DIR__ . '../../../functions.php';
use App\Exceptions\APIException;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function auth()
    {
        $user = Auth::user();
        if ($user) {
            return dataResponse(message: 'Authenticated');
        } else {
            throw new APIException(401, 'Login failed');
        }
    }
    public function index()
    {
        return dataResponse(new UserCollection(User::all()));
//        return new UserCollection(User::all());
    }

    public function store(UserAddRequest $request)
    {
        if ($request->role_id) {
            $user = User::create($request->all());
        } else {
            $user = User::create($request->all() + ['role_id' => 3]);
        }
        return dataResponse($user, 201);
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
    public function login(UserLoginRequest $request)
    {
        $user = User::where([
            'email' => $request->email,
        ])->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw new APIException(401, 'Authentication failed');

        }
//        if (!Hash::check($request->password, $user->password)) {
//        }

//        $user = User::where([
//            'email' => $request->email,
//            'password' => $request->password,
//        ])->first();
//        if (!$user) {
//            throw new APIException(401, 'Authentication failed');
//        }
        return dataResponse([
            'token' => $user->generateToken(),
            'name' => $user->first_name
        ]);
    }


    public function logout()
    {
        Auth::user()->logoutToken();
        return dataResponse(message: 'Logout');
//        return [
//            'success' => true,
//            'data' =>
//                [
//                    'message' => 'logout',
//                ]
//        ];
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
