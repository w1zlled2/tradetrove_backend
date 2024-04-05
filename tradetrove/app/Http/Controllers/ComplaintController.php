<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintAddRequest;
use App\Http\Resources\ComplaintCollection;
use App\Http\Resources\ComplaintResource;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole(['admin'])) {
            return new ComplaintCollection(Complaint::all());
        } else {
            return new ComplaintCollection(Complaint::where(['user_id' => $user->id])->get());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ComplaintAddRequest $request)
    {
//        return "метод выполнен";
        return Complaint::create($request->all()+['user_id' => Auth::user()->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        //
    }
}
