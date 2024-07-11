<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderEmail;
use Carbon\Carbon;
use App\Models\User;

class SendReminderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder email to users who have not accessed the website for a certain period.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::where('lastLogin', '<', Carbon::now()->subDays(30))->get();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new ReminderEmail($user));
            $user->update(['lastReminderSent' => now()]);

        }
    }
}
