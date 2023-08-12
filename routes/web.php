<?php

use App\Events\NewStudentAdded;
use App\Mail\FirstMail;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestEnrollmentController;

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

    $items=new Student();
    $items->name='test';
    $items->email='test2@test.com';
    $items->save();
    event(new NewStudentAdded($items));

  Mail::to('test@test.com')->send(new FirstMail("Faisal Ahmed"));
});




// ->cc($moreUsers)
//     ->bcc($evenMoreUsers)

Route::get("/send-testenrollment",[TestEnrollmentController::class,'sendTestNotification']);
