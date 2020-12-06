<?php

namespace App\Jobs;

use App\Models\Lottery;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AwardLottery implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $count = Lottery::count();
        $lotteries = Lottery::orderByRaw("RAND()")->limit($count / 4)->get();
        foreach ($lotteries as $lottery) {
            $lottery->winner = true;
        }
        Lottery::all()->delete();
    }
}
