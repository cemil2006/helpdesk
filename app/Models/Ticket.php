<?php

namespace App\Models;
use App\Models\Category;
use App\Models\User;
use App\Models\TicketStatus;
use Illuminate\Database\Eloquent\Model;


class Ticket extends Model
{
    public function User()
    {
        return $this -> belongsToMany(User::class, 'tickets_users');
    }

    public function Category()
    {
     return $this -> hasMany(Category::class);
    }

    public function TicketStatus()
    {
        return $this -> has(TicketStatus::class);
    }
}
