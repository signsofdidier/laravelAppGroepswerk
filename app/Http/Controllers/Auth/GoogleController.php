<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->getEmail())->first();
        if (!$user) {
            $user = User::create(['name' => $googleUser->getName(), 'email' => $googleUser->getEmail(), 'password' => bcrypt(Str::random(16)), 'google_id' => $googleUser->getId(), 'avatar' => $googleUser->getAvatar(),]);
            $user->assignRole('viewer');
        }
        Auth::login($user);
        return redirect()->route('dashboard');
    }
}
