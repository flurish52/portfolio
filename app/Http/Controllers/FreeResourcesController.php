<?php

namespace App\Http\Controllers;

use App\Models\FreeResources;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFreeResourcesRequest;
use App\Http\Requests\UpdateFreeResourcesRequest;
use inertia\inertia;

class FreeResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia::render('FreeResources', [

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
    public function store(StoreFreeResourcesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FreeResources $freeResources)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FreeResources $freeResources)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFreeResourcesRequest $request, FreeResources $freeResources)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FreeResources $freeResources)
    {
        //
    }
}
