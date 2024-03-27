<?php

use App\Jobs\ProcessDailyActivities;
use App\Jobs\ProcessMonthlyActivities;
use App\Jobs\ProcessWeeklyActivities;
use Illuminate\Support\Facades\Schedule;

Schedule::job(new ProcessDailyActivities)
    ->daily()
    ->timezone('UTC')
    ->at('00:00');

Schedule::job(new ProcessWeeklyActivities)
    ->wednesdays()
    ->timezone('UTC')
    ->at('00:00');

Schedule::job(new ProcessMonthlyActivities)
    ->monthly()
    ->timezone('UTC')
    ->at('00:00');
