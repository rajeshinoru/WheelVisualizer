<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\TicketMessage;
use App\User;
use Auth;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $user = User::find(Auth::user()->id);
        $tickets = $user->Tickets()->paginate(10); 

        return view('user.tickets',compact('user','tickets'));
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
            'invoice'=>'required|max:255',
            'subject'=>'required', 
            'description'=>'required|min:10', 
            // ticketno
            // userid
            // firstname
            // lastname
            // email
            // phone
            // status
            // closed_reason
            // closed_by
        ]);
        try{  

                $data = $request->except(['_token']);
                $data['status']='RAISED';
                if(Auth::user()){
                    $data['firstname']=Auth::user()->fname;
                    $data['lastname']=Auth::user()->lname;
                    $data['userid']=@Auth::user()->id; 
                }
                // dd($data);
                $ticket = Ticket::create($data);  
                $ticket->ticketno = getTicketNumber($ticket->id);
                $ticket->save();
                TicketMessage::create([
                    'ticket_id'=>$ticket->id,
                    'description'=>$request->description,
                    'postby'=>'user'
                ]);

                return back()->with('success','Your Ticket ( '.$ticket->ticketno.' )Raised Successfully!!');

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
        if($ticket->userid == Auth::user()->id){
            $messages = $ticket->Messages()->get();
            return view('ticket_view',compact('ticket','messages'));
        }
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
        //
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
}
