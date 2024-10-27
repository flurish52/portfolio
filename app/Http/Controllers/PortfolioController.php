<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\PortfolioProjectFileTypes;
use App\Models\PortfolioProjectImages;
use App\Models\PortfolioProjectProperties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


use inertia\inertia;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia::render('Portfolio',[
            'portfolios' => Portfolio::with(['images', 'properties', 'fileTypes'])
                ->get(),
        ]);
    }

    public function viewProject($slug)
    {        // Fetch the project by ID, along with its related images, properties, and file types
        $project = Portfolio::where('slug', $slug)->get()->first();
        $id = $project->id;
        $images = PortfolioProjectImages::where('portfolio_id',$id)->get();
        $properties = PortfolioProjectProperties::where('portfolio_id',$id)->get();
        $fileTypes = PortfolioProjectFileTypes::where('portfolio_id',$id)->get();

        // Return the view with the project details
        return Inertia::render('ViewProject', [
            'project' => $project,
            'images' => $images,
            'properties' =>$properties,
            'fileTypes' =>$fileTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia::render('Auth/CreatePortfolio', [

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the data
        $validatedData = $request->validate([
            'portfolio_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:portfolios,slug',
            'description' => 'nullable|string',
            'default_avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hover_avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'portfolio_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'portfolio_properties' => 'required|array|min:1',
            'portfolio_properties.*' => 'required|string|max:255',
            'file_types' => 'required|array|min:1',
            'file_types.*' => 'required|string|max:255',
        ]);


        // Save the portfolio to the portfolios table
        $portfolio = new Portfolio();
        $portfolio->portfolio_name = $validatedData['portfolio_name'];
        $portfolio->slug = $validatedData['slug'];
        $portfolio->description = $validatedData['description'];
        $portfolio->save();

        // Handle images upload (default and hover)
        $defaultImagePath = $request->file('default_avatar')->store('portfolio_images', 'public');
        $hoverImagePath = $request->file('hover_avatar')->store('portfolio_images', 'public');

        // Handle the file types for images (this could come from request or static assignment)
        $fileTypeDefaultImage = $request->file('default_avatar')->getClientMimeType();
        $fileTypeHoverImage = $request->file('hover_avatar')->getClientMimeType();

        // Save images to the images table
        $image = new PortfolioProjectImages();
        $image->portfolio_id = $portfolio->id;
        $image->default_image = basename($defaultImagePath);
        $image->hovered_image = basename($hoverImagePath);
        $image->file_type_default_image = $fileTypeDefaultImage;
        $image->file_type_hovered_image = $fileTypeHoverImage;
        $image->default_file_path = Storage::url($defaultImagePath);
        $image->hovered_file_path = Storage::url($hoverImagePath);
        $image->save();

        // Save additional portfolio images if provided
        if ($request->hasFile('portfolio_images')) {
            foreach ($request->file('portfolio_images') as $imageFile) {
                $additionalImagePath = $imageFile->store('portfolio_images' , 'public');
                $additionalImageType = $imageFile->getClientMimeType();

                $additionalImage = new PortfolioProjectImages();
                $additionalImage->portfolio_id = $portfolio->id;
                $additionalImage->hovered_image = basename($additionalImagePath);
                $additionalImage->default_image = basename($additionalImagePath);
                $additionalImage->file_type_default_image = $additionalImageType;
                $additionalImage->file_type_hovered_image = $additionalImageType;
                $additionalImage->default_file_path = Storage::url($additionalImagePath);
                $additionalImage->hovered_file_path = Storage::url($additionalImagePath);
                $additionalImage->save();
            }
        }

        // Save properties to the properties table
        foreach ($validatedData['portfolio_properties'] as $property) {
            $propertyModel = new PortfolioProjectProperties();
            $propertyModel->portfolio_id = $portfolio->id;
            $propertyModel->property = $property;
            $propertyModel->save();
        }

        // Save file types to the fileTypes table
        foreach ($validatedData['file_types'] as $fileType) {
            $fileTypeModel = new PortfolioProjectFileTypes();
            $fileTypeModel->portfolio_id = $portfolio->id;
            $fileTypeModel->file_type = $fileType;
            $fileTypeModel->save();
        }

        return redirect()->back()->with('success', 'Portfolio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        //
    }
}
