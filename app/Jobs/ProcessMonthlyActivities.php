<?php

namespace App\Jobs;

use App\Models\Activity;
use App\Models\ActivityHistory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessMonthlyActivities implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $activites = Activity::where([
            ['type', '=', 'monthly'],
            ['completed', '=', true],
        ])->get();

        foreach ($activites as $activity) {
            ActivityHistory::create(['activity_id' => $activity->id]);
            $activity->update(['completed' => false]);
        }
    }
}
