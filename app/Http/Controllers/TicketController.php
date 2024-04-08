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
        $data = Ticket::with('category','subCategory','childSubcategory','districts')->GET(10); // Change 10 to the number of items per page you want

        $tickets = $data->map(function ($ticket) {
            return [
                'ticket_number'        => $ticket->ticket_number,
                'name_mob'             => $ticket->name. "  <br>  " . $ticket->mobile,
                'name'                 => $ticket->name,
                'email'                => $ticket->email,
                'mobile'               => $ticket->mobile,
                'family_id'            => $ticket->family_id,
                'category_name'        => $ticket->category ? $ticket->category->name : null, // Assuming 'name' is the attribute storing the category name
                'subcategory_name'     => $ticket->subCategory ? $ticket->subCategory->name : null,
                'chidsubcategory_name' => $ticket->childSubcategory ? $ticket->childSubcategory->name : null,
                'assign_to'            => $ticket->assign_to,
                'auto_close'           => $ticket->auto_close, 
                'district_name'        => $ticket->districts ? $ticket->districts->name : null,
                'type'                 => $ticket->type,
                'source'               => $ticket->source,
                'channel'              => $ticket->channel,
                'user_id'              => $ticket->user_id,
                'created_at'           => $ticket->created_at,
                'resolved_date'        => $ticket->resolved_date,
            ];
        });

        return $this->successResponse($data);


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
                'user_id'       => auth()->id()
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
