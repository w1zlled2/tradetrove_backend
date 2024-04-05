<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConditionAddRequest;
use App\Models\Condition;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    public function index()
    {
        return [
            'data'=>Condition::all()
        ];
    }

    public function store(ConditionAddRequest $request)
    {
        return Condition::create($request->all());
    }

    public function show(Condition $condition)
    {
        return [
            'data'=>$condition
        ];
    }

    public function update(Request $request, Condition $condition)
    {
        return "Изменение состояния";
    }

    public function destroy(Condition $condition)
    {
        return "Удаление состояния";
    }
}
