<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketRemark;

class TicketRemarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($ticket_id)
    {
        $remarks = TicketRemark::where('ticket_id', $ticket_id)->get();

        return $this->successResponse($remarks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'user_id' => 'required|exists:users,id',
            'assign_to' => 'required|integer',
            'remark' => 'required|string',
            'attachments.*' => 'file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);
    
        $attachments = [];
    
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('attachments', 'public');
                $attachments[] = $path;
            }
        }
    
        $data['attachments'] = $attachments;
    
        $remark = TicketRemark::create($data);
    
        return $this->successResponse($remark);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = TicketRemark::find($id);

        return $this->successResponse($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'level' => 'sometimes|required|integer',
            'remark' => 'sometimes|required|string',
            'attachments' => 'nullable|array'
        ]);

        $ticketRemark->update($data);

        return $this->successResponse($ticketRemark);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = $ticketRemark->delete();

        return $this->successResponse($ticket);
    }
}
