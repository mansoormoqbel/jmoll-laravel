<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate;
use  App\Http\Middleware\CheckBanned;
class HomeController extends \Illuminate\Routing\Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        /* $this->middleware(CheckBanned::class); */
    }
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function logout(Request $request)
    {
       /*  return "www"; */
        Auth::logout();
      

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/ ');
    }
}
