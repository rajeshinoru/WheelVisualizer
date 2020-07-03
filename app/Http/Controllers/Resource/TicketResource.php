<?php

namespace App\Http\Controllers\Resource;

use App\Ticket;
use App\TicketMessage;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

 
        $tickets = Ticket::orderBy('updated_at','DESC')->paginate(10); 
        
        return view('admin.ticket.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [  
            'description'=>'required|min:10', 
            'postby'=>'required' ,
            'ticket_id'=>'required' 
        ]);
        try{  

                $data = $request->except(['_token']);
                $ticket = Ticket::where('id',$request->ticket_id)->first();
                $ticket_messages = TicketMessage::where('ticket_id',$ticket->id)->where('postby','admin')->count();
                if($ticket_messages == 0 || $ticket->status == 'RAISED'){
                    $ticket->status = 'ACCEPTED';
                    $ticket->save();
                }
                if($request->postby == 'admin'){
                    TicketMessage::create([
                        'ticket_id'=>$ticket->id,
                        'description'=>$request->description,
                        'postby'=>'admin'
                    ]);
                } else{

                }

                return back()->with('success','Your Reply was sent successfully!!');

        }catch(Exception $e){
            return back()->withInput(Input::all())->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    { 
            $messages = $ticket->Messages()->get(); 
            return view('admin.ticket.view',compact('ticket','messages'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    { 

        $this->validate($request, [  
            'reason'=>'required|min:10', 
            'status'=>'required'  
        ]);
        try{   
                if($ticket){
                    $ticket->status = $request->status;
                    $ticket->closed_reason = $request->reason;
                    $ticket->closed_by = 'admin';
                    $ticket->save();
                    return back()->with('success','Ticket Status Updated successfully!!');
                } else{
                    return back()->with('error','Ticket Not Found!!');
                }


        }catch(Exception $e){
            return back()->withInput(Input::all())->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }


    public function message_store(Request $request)
    {

    }

}
