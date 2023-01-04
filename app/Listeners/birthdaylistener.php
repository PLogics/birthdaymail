<?php

namespace App\Listeners;

use App\Events\birthdayevent;
use App\Jobs\birthdayjob;
use App\Mail\birthdaymail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class birthdaylistener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\birthdayevent  $event
     * @return void
     */
    public function handle(birthdayevent $event)
    {
        // dd($event->data['email']);
        // Mail::to($event->data['email'])->send(new birthdaymail($event->data));
        birthdayjob::dispatch($event)->delay(now()->addSeconds(1));
        // birthdayjob::dispatch($event);
        // dispatch(new birthdayjob($event));
    }
}
