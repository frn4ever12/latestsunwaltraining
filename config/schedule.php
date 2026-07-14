<?php

return [
    fn ($schedule) => $schedule->command('trainings:update-statuses')->dailyAt('00:00'),
];