<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Promotion;
use Carbon\Carbon;

class UpdatePromotionStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'promotions:update-status';
    protected $description = 'Update promotion status based on current date';
    /**
     * The console command description.
     *
     * @var string
     */


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        // Update status untuk promosi yang aktif
        Promotion::where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->update(['status' => 'active']);

        // Update status untuk promosi yang sudah kadaluarsa
        Promotion::where('end_date', '<', $now)
            ->update(['status' => 'expired']);

        $this->info('Promotion statuses updated successfully.');
    }
}
