<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Http\Resources\CategoryCollection;
use App\Filters\CategoryFilter;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $filter = new CategoryFilter();
        $queryItems = $filter->transform($request);
        $includeTickets = $request->query('includeTickets');
        $categories = Category::where($queryItems);
        if($includeTickets){
            $categories = $categories->with('tickets');
        }

        return new CategoryCollection($categories->paginate()->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        
        
        try {

            $category = Category::create($request->all());
        return response()->json(['message'=> 'Categoria creada'], 201);
         
         } catch(\Exception $e){
            return response()->json(['error'=> $e->getessage()], 500);
         }
        
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $includeTickets = request()->query('includeTickets');
    if ($includeTickets) {
        return new CategoryResource($category->loadMissing('tickets'));
    }
    return new CategoryResource($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->all());
            return response()->json(['message' => 'Categoria actualizada correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
    
            return response()->json(['message' => 'Categoria eliminada correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    


}
