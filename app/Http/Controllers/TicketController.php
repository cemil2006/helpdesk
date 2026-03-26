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
        $ticketstatuses = TicketStatus::all();
        $tickets = Ticket::all();

        // Default to the first available status if not explicitly set in the form
        $defaultStatusId = $ticketstatuses->first()?->id;

        return view('tickets.create', compact('tickets', 'ticketstatuses', 'defaultStatusId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'ticket_status_id' => 'nullable|exists:ticket_statuses,id',
        ]);

        $statusId = $validated['ticket_status_id'] ?? TicketStatus::first()?->id;
        if (! $statusId) {
            abort(500, 'Geen ticketstatus beschikbaar. Voeg eerst een ticketstatus toe.');
        }

        $ticket = new Ticket;
        $ticket->title = $validated['title'];
        $ticket->description = $validated['description'];
        $ticket->priority = $validated['priority'];
        $ticket->ticket_status_id = $statusId;
        $ticket->save();

        return redirect('tickets/index');
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
        $ticketstatuses = TicketStatus::all();

        return view('tickets.edit', compact('ticket', 'ticketstatuses'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->priority = $request->priority;
        $ticket->ticket_status_id = $request->ticket_status_id;
        $ticket->save();

        return redirect('tickets/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect('tickets/index');
    }
}
