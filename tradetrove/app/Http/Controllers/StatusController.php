<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusAddRequest;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        return [
            'data'=>Status::all()
        ];
    }

    public function store(StatusAddRequest $request)
    {
        return Status::create($request->all());
    }

    public function show(Status $status)
    {
        return [
            'data'=>$status
        ];
    }

    public function update(Request $request, Status $status)
    {
        return "Изменение статуса";
    }

    public function destroy(Status $status)
    {
        return "Удаление статуса";
    }
}
