<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicket;
use App\Http\Requests\StoreTicketMessage;
use App\Models\Ticket;
use App\Models\TicketMessage;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

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
        $tickets = Ticket::orderByDesc('updated_at')->where('user_id', $this->user_id)->get();
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
        $ticket = $this->RepoCreateTicket($request);

        // create ticket_message
        $this->RepoCreateTicketMessage($ticket->id, $request);

        return redirect('/ticket');
    }

    /**
     * Store a newly created ticket messages in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function CreateTicketMessage(StoreTicketMessage $request, $tid)
    {
        // update ticket
        $ticket = Ticket::find($tid);
        $ticket->was_answered = 0;
        $ticket->save();

        // create ticket_message
        $this->RepoCreateTicketMessage($tid, $request);


        return redirect('/ticket/' . $tid);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $tickets = Ticket::where('id', $id)->where('user_id', Auth::user()->id)->get();
        foreach ($tickets as $ticket){
            $ticketMessages = $ticket->ticketMessages;
            return view('users.ticketMessages', compact('ticketMessages', 'ticket'));
        }
    }

    /**
     * Download specified image.
     *
     * @param  string  $image
     * @return \Illuminate\Http\Response
     */
    public function Download($image)
    {
        $filePath = storage_path('app/public/uploads/') . $image;
        return Response::download($filePath);

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


    public function RepoCreateTicketMessage($tid, $request)
    {
        $ticketMessage = new TicketMessage();
        $ticketMessage->ticket_id = $tid;
        $ticketMessage->question = $request->input('question');
        $ticketMessage->question_time = Carbon::now();
        if($request->hasFile('question_image')) {
            if($request->file('question_image')->isValid()) {
                $filename = time(). '-' . $request->file('question_image')->getClientOriginalName();
                $request->file('question_image')->move(storage_path('app/public/uploads'), $filename);
                $ticketMessage->question_image = $filename;
            }
        }

        $ticketMessage->save();
    }

    public function RepoCreateTicket($request)
    {
        $ticket = new Ticket();
        $ticket->title = $request->input('title');
        $ticket->was_answered = 0;
        $ticket->user_id = Auth::user()->id;
        $ticket->save();
        return $ticket;
    }
}
