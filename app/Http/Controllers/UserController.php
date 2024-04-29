<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use App\Models\User;
use App\Models\Authority;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Str;
use Auth;

class UserController extends Controller
{
    use ApiResponses;
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::with('authority');
        $users =     $query->paginate(10); 
        return $this->successResponse($users);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
           ////
        } catch (ClientException $e) {
            \Log::error($e);
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = user::find($id);

        return $this->successResponse($data);
    }

    /** from storage.
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource
     * 
        */
     public function destroy(string $id)
    {
        //
    }
    public function authorities()
    {
        $data = Authority::get();
 

        return $this->successResponse($data);
    }
   
}
