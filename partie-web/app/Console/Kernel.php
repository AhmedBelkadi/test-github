<?php

namespace App\Console;

use App\Models\Absence;
use App\Models\QRCodeScan;
use App\Models\Seance;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {
            // Get all active sessions
            Log::info('Scheduled task started');
            $activeSessions = Seance::where('expired', false)->get();
            Log::info($activeSessions);
            foreach ($activeSessions as $session) {
                // Check if session start time is in the cache
            Log::info('hhhh');
                if (Cache::has('session_start_time_' . $session->id)) {
                    $sessionStartTime = Cache::get('session_start_time_' . $session->id);
                    Log::info('session start: '. $sessionStartTime);
                    Log::info(Carbon::now()." > ".$sessionStartTime->addMinutes(5));

                    // Get the session start time from the cache
                    // Check if 15 minutes have elapsed since the session start time
                    if (Carbon::now() > $sessionStartTime->addMinutes(5)) {
                        // Mark students who haven't scanned the QR code as absent
                        $absentStudents = $session->expectedStudents()->whereNotIn('id', $session->scannedStudents()->pluck('id'))->get();
                        Log::info("absent student",$absentStudents);
                        foreach ($absentStudents as $student) {
                            Absence::create([
                                'id_seance' => $session->id,
                                'id_etudiant' => $student->id,
                                'date' => now()->toDateString(), // Or use the session date
                                // Other relevant data
                            ]);
                        }
                        // Update session status to expired
                        $session->update(['expired' => true]);
                    }
                }
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
