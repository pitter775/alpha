<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\newLaravelTips;
use \stdClass;

class EmailsController extends Controller
{
    public function enviarlink(Request $request)
    {
        $user = new stdClass();
        $user->name = 'Responsavel';
        $user->email = $request->email;
        $user->token = $request->token;
        //return new \App\Mail\newLaravelTips($user);
        Mail::send(new newLaravelTips($user));
    }
}
