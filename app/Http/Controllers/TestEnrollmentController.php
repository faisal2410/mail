<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\TestEnrollmnetNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class TestEnrollmentController extends Controller
{
    public function sendTestNotification(){
        $user=User::first();

        $enrollmentData=[
            'body'=>'You received a new test notification',
            'text'=>'You are allowed to enroll',
            'url'=>url('/'),
            'thankyou'=>'You have 14 days to enroll'


        ];

        // $user->notify(new TestEnrollmnetNotification($enrollmentData));
        Notification::send($user,new TestEnrollmnetNotification($enrollmentData));
    }
}
