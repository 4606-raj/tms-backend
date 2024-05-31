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
    public function index(Request $request)
    {
        $query = Ticket::with('users:id,name','category:id,name','subCategory:id,name','childSubcategory','districts','channels','sources');
        if($request->type){
            $query->where('type',"=",$request->type);
        }
        if($request->district){
            $query->where('district',"=",$request->district);
        }
        if($request->status){
            $query->where('status',"=",$request->status);
        }
        if($request->start & $request->end){
            $query->where(['created_at'=> $request->start,'resolved_at'=> $request->end]);
        }
        if($request->start){
            $query->date('created_at',$request->start);
        }
        if($request->end){
            $query->date('resolved_at',"=",$request->status);
        }
        if($request->category_id){
            $query->where('category_id',$request->category_id);
        }
        if($request->sub_category_id){
            $query->where('subcategory_id',$request->subcategory_id);
        }
        if($request->child_subcategory_id){
            $query->where('child_sub_category_id',$request->child_subcategory_id);
        }
        if($request->assign_by){
            $query->where('assign_by',$request->assign_by);
        }
        if($request->assign_to){
            $query->where('assign_to',$request->assign_to);
        }
      
        $tickets =     $query->paginate(10); 
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
        $data = $request->validate([
            'description' => 'required',
           
        ]);

        $ticket->update($data);

        return $this->successResponse($ticket);
    }

    /**
     * Remove the specified resource
     * 
        */
     public function destroy(string $id)
    {
        //
    }
    public function search(Request $request)
    {
        dd($request->all());
        $query = Ticket::with('users:id,name','category:id,name','subCategory:id,name','childSubcategory','districts','channels','sources');
       
        if($request->search == 'ticket_number'){
            $query->where('ticket_number',"=",$request->ticket_number);
        }
        if($request->search == 'family_id'){
            $query->where('family_id',"=",$request->family_id);
        }
        if($request->search == 'mobile'){
            $query->where('mobile',"=",$request->mobile);
        }
        $ticket =     $query->first(); 
        return $this->successResponse($ticket);


    }
}
