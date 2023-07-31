<?php

use App\Http\Controllers\TestEnrollmentController;
use App\Mail\FirstMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-mail', function () {
  Mail::to('test@test.com')->send(new FirstMail("Faisal Ahmed"));
});




// ->cc($moreUsers)
//     ->bcc($evenMoreUsers)

Route::get("/send-testenrollment",[TestEnrollmentController::class,'sendTestNotification']);
