<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use App\Models\Category;

class CategoriesController extends Controller
{

    use ApiResponses;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::with('subcategories')->where('cat_id','=','1')->get();
 

        return $this->successResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function subCategories()
    {
        $data = Category::with('subcategories')->where('cat_id','=','1')->get();

        return $this->successResponse($data);
    }
    public function childSubCategories($id)
    {
        $data = Category::with('subcategories')->where('cat_id','=',$id)->get();

        return $this->successResponse($data);
    }
}
