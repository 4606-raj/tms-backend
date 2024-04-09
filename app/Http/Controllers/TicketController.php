<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use App\Models\Ticket;
use App\Models\Category;
use App\Http\Requests\TicketRequest;
use Illuminate\Support\Str;
use Auth;

class TicketController extends Controller
{
    use ApiResponses;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::with('users:id,name','category:id,name','subCategory:id,name','childSubcategory','districts','channels','sources')->paginate(10); // Change 10 to the number of items per page you want
        return $this->successResponse($tickets);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketRequest $request)
    {
        try {
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
                'ticket_number' => \Str::random(8),
                'user_id'       => auth()->id(),
                'assign_by'     => auth()->id()
            ]);

            return $this->successResponse($response, 'Ticket Created Successfully');
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
