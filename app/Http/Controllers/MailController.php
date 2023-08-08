<?php

namespace App\Http\Controllers;

use App\Mail\SignupMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendmail(){
      Mail::to('wachechek@gmail.com')->send(new SignupMail());
    }
}
