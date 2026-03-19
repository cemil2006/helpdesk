<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketStatus extends Model
{
    /**
     * Tickets that have this status.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'ticket_status_id');
    }
}
