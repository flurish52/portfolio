<?php

namespace App\Http\Controllers;

use App\Models\DesignTemplates;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDesignTemplatesRequest;
use App\Http\Requests\UpdateDesignTemplatesRequest;
use inertia\inertia;

class DesignTemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia::render('DesignTemplates', [

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
    public function store(StoreDesignTemplatesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DesignTemplates $designTemplates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DesignTemplates $designTemplates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDesignTemplatesRequest $request, DesignTemplates $designTemplates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DesignTemplates $designTemplates)
    {
        //
    }
}
