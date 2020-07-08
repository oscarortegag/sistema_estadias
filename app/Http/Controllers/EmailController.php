<?php

namespace App\Http\Controllers;

use App\Mail\EmailEncuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function envio()
    {

        Mail::to('wsanchez7012@gmail.com')->send(new EmailEncuesta());
        //return view('users.index', compact('users'));
    }
}
