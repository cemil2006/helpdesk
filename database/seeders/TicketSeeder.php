<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Ticket::create([
            'title' => 'Printer not working',
            'description' => 'The printer in the office is not responding to print jobs. Please investigate.',
            'priority' => 'high',
        ]);

        Ticket::create([
            'title' => 'Update software licenses',
            'description' => 'Need to renew the annual licenses for Microsoft Office suite.',
            'priority' => 'medium',
        ]);

        Ticket::create([
            'title' => 'Password reset required',
            'description' => 'Employee forgot their password and cannot access the company portal.',
            'priority' => 'low',
        ]);
    }
}
