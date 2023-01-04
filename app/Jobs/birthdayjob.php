<?php

namespace App\Jobs;

use App\Listeners\birthdaylistener;
use App\Mail\birthdaymail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;


class birthdayjob implements ShouldQueue
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
        $users = User::whereMonth('dob',Carbon::now()->month)
                    ->whereDay('dob', Carbon::now()->day)
                    ->get();
            foreach ($users as $user) {
                Mail::to($user)->send(new birthdaymail($user));
            }
        // $data=DB::table('users')->get();
        // foreach($data as $data)
        // {
        //     // echo $data->email;
        //     // echo "<br/>";
        //     Mail::to($data->email)->send(new birthdaymail($data));
        // }
        // dd($event);
    }
}
