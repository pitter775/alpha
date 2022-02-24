<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddToSessionAfterLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $perfil = Auth::user()->use_perfil;
        $id = Auth::user()->id;

        $series  = DB::table('professores AS u')
        ->select('*', 'series.id AS id')
        ->leftjoin('series', 'u.prof_series_id', 'series.id') 
        ->where('u.prof_users_id', $id)
        ->get();       


        session(['perfil' => $perfil]);
        session(['series' => $series]);

    }
}
