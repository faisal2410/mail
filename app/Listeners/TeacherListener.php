<?php

namespace App\Listeners;

use App\Events\NewStudentAdded;
use App\Mail\FirstMail;
use App\Models\Teacher;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class TeacherListener
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
        Mail::to(Teacher::first()->email)->send(new FirstMail($event->student->name));
    }
}
