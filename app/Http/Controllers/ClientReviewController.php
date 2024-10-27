<?php

namespace App\Http\Controllers;

use App\Models\ClientReview;
use App\Http\Requests\UpdateClientReviewRequest;
use Illuminate\Http\Request;
use inertia\Inertia;

class ClientReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia::render('Auth/ViewReviews', [
            'adminReviews' => ClientReview::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia::render('Auth/CreateClientReview', [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'form.client_name' => 'required|string|max:255',
            'form.company_role' => 'required|string|max:255',
            'form.message' => 'required|string',
            'form.avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('form.avatar')) {
            $avatarPath = $request->file('form.avatar')->store('avatars', 'public');
            $validatedData['form']['avatar'] = $avatarPath;
        }
        ClientReview::create($validatedData['form']);
        return response()->json([
            'message' => 'Good to go',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientReview $clientReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientReview $clientReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientReviewRequest $request, ClientReview $clientReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientReview $clientReview)
    {
        //
    }
}
