<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Deal;
use Illuminate\Console\Command;

class CheckDeals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:deals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command checks the active deals for expiration';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $activeDeals = Deal::where('active', 1)->get();

        $currentTime = Carbon::now();

        foreach ($activeDeals as $deal) {
            if($deal->end_at->lessThan($currentTime)){
                $deal->update(['active' => 0]);
            }
        }

        logger('Done!');

        return Command::SUCCESS;
    }
}
