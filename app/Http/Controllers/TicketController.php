<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketStatus;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tickets = Ticket::all();
        return view('tickets.create', compact('tickets'))
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = new Ticket;
        $ticket->$title=$request->$title;
        $ticket->$description=$request->$description;
        $ticket->$priority=$request->$priority;
        ticket->save();
        return redirect('tickets.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }
        
        /**
         * Show the form for editing the specified resource.
        */
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->$title=$request->$title;
        $ticket->$description=$request->$description;
        $ticket->$priority=$request->$priority;
        ticket->save();
        return redirect('tickets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->destroy();
        return redirect('ticket.index');
    }
}
