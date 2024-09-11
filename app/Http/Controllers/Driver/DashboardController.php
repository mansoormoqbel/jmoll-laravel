<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()  {
        
        $user= Auth::user()->first();
        return view('driver.dashboard',compact('user'));
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
