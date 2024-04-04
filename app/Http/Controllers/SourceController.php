<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use App\Models\Source;

class SourceController extends Controller
{

    use ApiResponses;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Source::where('status','1')->get();


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
   
}
