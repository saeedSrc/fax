<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicket;
use App\Models\Ticket;
use App\Models\TicketMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    private $user_id;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user_id = Auth::user()->id;
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all()->where('user_id', $this->user_id);
        return view('users.tickets', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicket $request)
    {
        // create ticket
        $ticket = new Ticket();
        $ticket->title = $request->input('title');
        $ticket->was_answered = 0;
        $ticket->user_id = Auth::user()->id;
        $ticket->save();

       // create ticket_message
        $ticketMessage = new TicketMessage();
        $ticketMessage->ticket_id = $ticket->id;
        $ticketMessage->question = $request->input('question');
        $ticketMessage->save();

        return redirect('/ticket');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
