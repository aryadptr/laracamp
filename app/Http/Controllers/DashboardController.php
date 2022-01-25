<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        $checkouts = Checkout::with('Camp')->whereUserId(Auth::id())->get();
        return view('pages.dashboard', [
            'checkouts' => $checkouts
        ]);
    }
}
