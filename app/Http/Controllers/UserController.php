<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\UserRequest;
use App\Http\Requests\Api\V2\Auth\RegisterRequest;
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
        $users = User::paginate(10); 
          
        return $this->successResponse($users);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => $request->password,
                'login'         => $request->name,
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'mobile'        => $request->mobile,
                'profile'       => $request->profile,
                'service'       => $request->service,
                'district_id'   => $request->district_id,
                'authority_id'  => $request->authority_id,
                'category_id'  => $request->category_id,
                'sub_category_id'  => $request->sub_category_id,
                'child_sub_category_id'  => $request->child_sub_category_id,
            ]);
            
    
            $user->assignRole($request->profile);
            // $responseData = [
            //     'user' => $user,
            // ];
            // $jsonResponse = new Response(json_encode($responseData), Response::HTTP_OK, ['Content-Type' => 'application/json']);
    
            return $this->successResponse($user);
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
   
    public function getPermissions() {
        return $this->successResponse(auth()->user()->getAllPermissions()->pluck('name'));
    }
    public function ppaUsers(Request $request)
    {
        if(!empty($request->family_id)){
            $familyId = $request->family_id;
            $users = PpaUser::where('family_id',$familyId)->get(); 
            if(empty($users)){
                return $this->errorResponse($users);
            }
        }else{
            $users = [];
        }
          
        return $this->successResponse($users);


    }
   
    
    
}
