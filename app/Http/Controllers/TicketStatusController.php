<?php

namespace App\Http\Controllers;

use App\Models\TicketStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TicketStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticketstatuses  = TicketStatus::all();
        return view('ticketstatuses.index', compact('ticketstatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ticketstatuses  = TicketStatus::all();
        return view('ticketstatuses.create', compact('ticketstatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticketstatuses  = new  TicketStatus();
        $ticketstatuses ->state = $request->state;
        $ticketstatuses ->save();

        return redirect('ticket-statuses/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TicketStatus $status)
    {
        return view('ticketstatuses.show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TicketStatus $status)
    {
        return view('ticketstatuses.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TicketStatus $status)
    {
        $status->state = $request->state;
        $status->save();
        return Redirect('ticket-statuses/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketStatus $status)
    {
        $status->delete();
        return Redirect('ticket-statuses/index');
    }
}
