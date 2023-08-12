<?php

namespace App\Listeners;

use App\Mail\FirstMail;
use App\Events\NewStudentAdded;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewStudentWelcomeMail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewStudentAdded $event): void
    {
        Mail::to( $event->student->email )->send( new FirstMail($event->student->name) );
    }
}
