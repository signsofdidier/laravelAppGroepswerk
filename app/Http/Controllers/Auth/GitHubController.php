<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GitHubController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        $githubUser = Socialite::driver('github')->stateless()->user();
        $user = User::where('email', $githubUser->getEmail())->first();
        if (!$user) {
            $user = User::create(['name' => $githubUser->getName() ?? $githubUser->getNickname(), 'email' => $githubUser->getEmail(), 'password' => bcrypt(Str::random(16)), 'github_id' => $githubUser->getId(), 'avatar' => $githubUser->getAvatar(),]);
            $user->assignRole('viewer');
        }
        Auth::login($user);
        return redirect()->route('dashboard');
    }
}
