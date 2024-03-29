<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use App\Models\Ticket;
use App\Http\Requests\TicketRequest;

class TicketController extends Controller
{
    use ApiResponses;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Ticket::all();

        return $this->successResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketRequest $request)
    {
        try {
<<<<<<< Updated upstream

            $response = Ticket::create($request->all());
            
=======
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                // Add more validation rules as needed
            ];
    
            // Validate the request
            $validatedData = $request->validate($rules);

            $response = Ticket::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'family_id'      => $request->family_id,
                'mobile'         => $request->mobile,
                'auto_close'    => $request->auto_close,
                'district'     => $request->district,
                'type'        => $request->type,
                'source'       => $request->source,
                'channel'       => $request->channel,
                'category_id'   => $request->category_id,
                'sub_category_id'  => $request->sub_category_id,
                'child_sub_category_id'  => $request->child_sub_category_id,
                'description'  => $request->description,
                'attachment'  => $request->attachment,
            ]);
>>>>>>> Stashed changes
        } catch (ClientException $e) {
            // $errors = json_decode($e->getResponse()->getBody()->getContents(), true)['errors'];
            // $errors = collect($errors)->map(function ($error) {
            //     return Error::fromArray($error);
            // });
            // return ErrorResponse::make($errors);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Ticket::find($id);

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
}
