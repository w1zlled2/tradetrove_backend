<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleAddRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return [
            'data'=>Role::all()
        ];
    }

    public function store(RoleAddRequest $request)
    {
        return Role::create($request->all());
    }

    public function show(Role $role)
    {
        return [
            'data'=>$role
        ];
    }

    public function update(Request $request, Role $role)
    {
        return "Изменение роли";
    }

    public function destroy(Role $role)
    {
        return "Удаление роли";
    }
}
