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
        $statuses = TicketStatus::all();
        return view('ticketstatuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = TicketStatus::all();
        return view('ticketstatuses.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $statuses = new  TicketStatus();
        $statuses->state = $request->state;
        $statuses->save();

        return redirect('ticketstatuses/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TicketStatus $statuses)
    {
        return view('ticketstatuses.show', compact('statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TicketStatus $statuses)
    {
        return view('ticketstatuses.edit', compact('statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TicketStatus $status)
    {
        $status->state = $request->state;
        $status->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketStatus $ticketStatus)
    {
        $ticketStatus->delete();
        return Redirect('ticketstatuses/index');
    }
}
