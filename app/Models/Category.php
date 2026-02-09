<?php

namespace App\Models;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Ticket()
    {
        return $this -> belongsTo(Ticket::class);
    }
}
