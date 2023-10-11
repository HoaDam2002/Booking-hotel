<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Bookings;

class DeleteBooking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteBooking:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentTime = now()->format('Y-m-d H:i:s');
        Bookings::where('checkOut', '<', $currentTime)->delete();
    }
}
