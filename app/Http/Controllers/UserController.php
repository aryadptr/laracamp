<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    // login
    public function login(){
        return view('pages.login');
    }

    public function google(){
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $callback = Socialite::driver('google')->stateless()->user();
        $data = [
            'name'=> $callback->getName(),
            'email'=> $callback->getEmail(),
            'avatar'=> $callback->getAvatar(),
            'email_verified_at'=> date('Y-m-d H:i:s', time()),
        ];

        $user = User::firstOrCreate(['email'=> $data['email']], $data);
        Auth::login($user, true);

        return redirect(route('home'));
    }
}
