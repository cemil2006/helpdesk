<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketStoreRequest;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\TicketStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Ticket::query();

        // Filter op prioriteit
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        // Filter op categorie
        if ($request->filled('category_id')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('category_id', $request->category_id);
            });
        }

        $tickets = $query->get();
        $categories = Category::all();

        return view('tickets.index', compact('tickets', 'categories'));
    }

    /**
     * Display a listing of the current user's tickets.
     */
    public function myTickets(Request $request)
    {
        $query = Auth::user()->Ticket();

        // Filter op categorie
        if ($request->filled('category_id')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('category_id', $request->category_id);
            });
        }

        $tickets = $query->get();
        $categories = Category::all();

        return view('tickets.my-tickets', compact('tickets', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $ticketstatuses = TicketStatus::all();
        $tickets = Ticket::all();
        return view('tickets.create', compact('tickets', 'ticketstatuses', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketStoreRequest $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om een ticket aan te maken.');
        }

        $ticket = new Ticket;
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->priority = $request->priority;
        $ticket->ticket_status_id = $request->ticket_status_id;
        $ticket->save();

        $ticket->categories()->sync($request->categories);
        $ticket->users()->attach(Auth::id());
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
        $categories = Category::all();
        return view('tickets.edit', compact('ticket', 'ticketstatuses', 'categories'));
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

        $ticket->categories()->sync($request->categories);


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
