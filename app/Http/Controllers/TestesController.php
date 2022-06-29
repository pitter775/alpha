<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestesController extends Controller
{
    public function show( User $user){
        dd($user->email);
        return $user;
    }
}
