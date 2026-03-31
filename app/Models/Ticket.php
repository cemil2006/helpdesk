<?php

namespace App\Models;

use App\Models\Category;
use App\Models\TicketStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function User()
    {
        return $this->belongsToMany(User::class, 'tickets_users');
    }

    /**
     * Category the ticket belongs to.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'tickets_categories' );
    }

    /**
     * Status of the ticket.
     */
    public function status()
    {
        return $this->belongsTo(TicketStatus::class, 'ticket_status_id');
    }
}
