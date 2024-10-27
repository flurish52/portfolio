<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateHireMeRequest;
use Illuminate\Http\Request;
use App\Models\HireMe;
use Inertia\inertia;

class HireMeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia::render('Auth/HireMe', [
            'hireMeRequests' => HireMe::all(),
        ]);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|email',
            'telephone' => 'nullable|string',
            'message' => 'required|string',
        ]);
        $validatedData['read_status'] = false;

        HireMe::create($validatedData);
        return redirect('/alert');
    }


    /**
     * Display the specified resource.
     */
    public function show(HireMe $hireMe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HireMe $hireMe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHireMeRequest $request, HireMe $hireMe)
    {

    }

    public function updateReadStatus(Request $request, $id)
    {
        $hireMeRequest = HireMe::find($id)->first();
        $hireMeRequest->read_status = $request->read;
        $hireMeRequest->save();

        return response()->json([
            'message' => 'Quote has marked as'. $request->read
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function replyHireMe($id)
    {
        return inertia::render('Auth/HireMeRequestReplyForm', [
            'hireMeRequest' => HireMe::find($id)->first()
        ]);
    }

    public function destroy(HireMe $hireMe)
    {
        //
    }
}
