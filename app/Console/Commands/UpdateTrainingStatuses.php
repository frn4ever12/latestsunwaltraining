<?php

namespace App\Console\Commands;

use App\Models\Training;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateTrainingStatuses extends Command
{
    protected $signature = 'trainings:update-statuses';
    protected $description = 'Update training statuses based on their dates';

    public function handle(): int
    {
        $today = Carbon::today();
        $count = 0;

        $upcomingTrainings = Training::where('status', 'upcoming')
            ->whereDate('start_miti_ad', $today)
            ->get();

        foreach ($upcomingTrainings as $training) {
            $training->status = 'active';
            $training->save();
            $count++;
        }

        $activeTrainings = Training::where('status', 'active')
            ->whereDate('end_miti_ad', '<', $today)
            ->get();

        foreach ($activeTrainings as $training) {
            $training->status = 'completed';
            $training->save();
            $count++;
        }

        $this->info("Updated {$count} training statuses.");
        return Command::SUCCESS;
    }
}