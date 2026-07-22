<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
{
    return Socialite::driver('google')
        ->stateless()
        ->redirectUrl(url('/auth/google/callback'))
        ->with([
            'prompt' => 'select_account'
        ])
        ->redirect();
}

    // Callback dari Google
    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => Hash::make('google-login'),
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
                'role' => 'user',
            ]);
        } else {
            $user->update([
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
            ]);
        }

        Auth::login($user);


if (session()->has('checkout_event_id')) {

    $eventId = session('checkout_event_id');

    session()->forget('checkout_event_id');

    return redirect()->route('checkout.create', $eventId);
}


return redirect()->route('home');
    }
}