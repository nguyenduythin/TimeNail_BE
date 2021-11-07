<?php

namespace App\Http\Controllers\api\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginWithGoogleController extends Controller
{
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        $user = Socialite::driver('google')->stateless()->user();
        // Check Users Email If Already There
        $is_user = User::where('email', $user->getEmail())->first();
        if (!$is_user) {
            $saveUser = User::updateOrCreate([
                'google_id' => $user->getId(),
            ], [
                'full_name' => $user->getName(),
                'email' => $user->getEmail(),
                'avatar' => $user->avatar,
                'password' => Hash::make($user->getName() . '@' . $user->getId())
            ]);
            $saveUser->syncRoles("Member");
     
            $saveUser = User::where('email', $user->getEmail())->first();
        } else {
            $saveUser = User::where('email',  $user->getEmail())->update([
                'google_id' => $user->getId(),
            ]);
            $saveUser = User::where('email', $user->getEmail())->first();
        }
        $saveUser->load('roles');

        return response()->json(['user' => $saveUser, 'token' => $user->token]);
    }
}
