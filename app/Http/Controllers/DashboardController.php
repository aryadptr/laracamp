<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Auth;

class DashboardController extends Controller
{
    public function index(){


        switch (Auth::user()->isAdmin) {
            case true:
                return redirect(route('admin.dashboard'));
                break;
            default:
                $checkouts = Checkout::with('Camp')->whereUserId(Auth::id())->get();
                return view('pages.dashboard', [
                    'checkouts' => $checkouts
                ]);
                break;
        }
    }
}
