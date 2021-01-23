<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketMessage;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth::check() && config('constants.user_type_admin') == Auth::user()->type) {
                return $next($request);
            } else {
                return redirect('/'); // not  authorize
            }

        });
    }



    /**
     * Get users tickets
     *
     * @return \Illuminate\Http\Response
     */
    public function GetUsersTickets()
    {
        $tickets = Ticket::orderByDesc('updated_at')->paginate(50);
        return view('admin.tickets', compact('tickets'));
    }

    /**
     * Show user ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowTicket($id)
    {
        $ticket = Ticket::Find($id);
        $user = $ticket->user;
        $ticketMessages = $ticket->ticketMessages;
        return view('admin.ticketMessages', compact('ticketMessages', 'ticket', 'user'));

    }

    /**
     * Update user ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function UpdateTicket(Request $request, $tid, $tmid)
    {
        $ticket = Ticket::find($tid);
        $ticket->was_answered = 1;
        $ticketMessage = TicketMessage::Find($tmid);
        $ticketMessage->answer = $request->input('answer');
        $ticketMessage->answer_time = Carbon::now();
        if ($request->hasFile('answer_image')) {
            if ($request->file('answer_image')->isValid()) {
                $filename = time() . '-' . $request->file('answer_image')->getClientOriginalName();
                $request->file('answer_image')->move(storage_path(config('constants.ticket_answer_img_path')), $filename);
                $ticketMessage->answer_image = $filename;
            }
        }

        $ticketMessage->save();
        $ticket->save();
        return redirect('/admin/ticket/' . $tid);

    }

}
