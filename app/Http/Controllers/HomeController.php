<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use QrCode;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $publicacoes  = DB::table('publicacoes AS c')
        ->where('pub_status', 'Ativo')
        ->select('*')
        ->get();

        
        return view('pages.site.home', compact('publicacoes'));
    }
    public function escola()
    {
        $publicacoes  = DB::table('publicacoes AS c')
        ->where('pub_status', 'Ativo')
        ->select('*')
        ->get();

        
        return view('pages.site.escola', compact('publicacoes'));
    }
    public function teste01(){

        $img =  \QrCode::size(300)->backgroundColor(255,90,0)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8');
        // $img =  \QrCode::size(300)->format('png')->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));

        // echo $img;

        

        // dd($img->svg());

        return view('pages.site.teste');
    }
    public function matricula()
    {
        return view('pages.site.matricula'); 
    }
    public function publi($id)
    {
        $publicacoes  = DB::table('publicacoes AS c')
        ->where('id', $id)
        ->select('*')
        ->first();

        return view('pages.site.publicacao', compact('publicacoes'));
    }
    
}
