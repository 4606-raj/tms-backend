<?php

namespace App\Http\Controllers\Api\V2\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V2\Auth\RegisterRequest;
use LaravelJsonApi\Core\Document\Error;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Api\V2\Auth\LoginRequest;
use App\Traits\ApiResponses;
use App\Models\User;
use App\Models\Role;

class RegisterController extends Controller
{
    use ApiResponses;
        /**
     * Handle the incoming request.
     *
     * @param \App\Http\Requests\Api\V2\Auth\RegisterRequest $request
     *
     * @return \Symfony\Component\HttpFoundation\Response|\LaravelJsonApi\Core\Document\Error
     * @throws \Exception
     */
    public function __invoke(RegisterRequest $request): Response|Error
    {
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
        ]);

        $user->assignRole($request->profile);
        $responseData = [
            'user' => $user,
        ];
        $jsonResponse = new Response(json_encode($responseData), Response::HTTP_OK, ['Content-Type' => 'application/json']);

        return $jsonResponse;
        // return (new LoginController)(new LoginRequest($request->only(['email', 'password'])));
    }
    public function showRegistrationForm()
    {
        // Only authenticated admin users can access registration form
        if (auth()->check() && auth()->user()->isAdmin()) {
            
        } else {
            abort(403); // or redirect to unauthorized page
        }
    }
    public function getRoles()
    {
        $data = Role::select('id','name')->get();
        return $this->successResponse($data);
    }
   
   
}
