<?php

namespace App\Console\Commands;

use App\Events\birthdayevent;
use App\Mail\birthdaymail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AutoBirthDayWish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $users = User::whereMonth('dob',Carbon::now()->month)
        //             ->whereDay('dob', Carbon::now()->day)
        //             ->get();
        //     foreach ($users as $user) {
        //         Mail::to($user)->send(new birthdaymail($user));
        //     }
    }
    //     return Command::SUCCESS;

    // }
}
