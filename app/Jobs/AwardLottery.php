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
        $awardedLottery = Lottery::orderByRaw("RAND()")->first();
        $awardedLottery->winner = true;
        $awardedCoin = (5 * $count) * 0.8;

        $awardedLottery->prize = $awardedCoin;
        $awardedLottery->save();

        $awardedLottery->user->coin = $awardedLottery->user->coin + $awardedCoin;
        $awardedLottery->user->save();

        Lottery::destroy(Lottery::all()->pluck('id'));
    }
}
