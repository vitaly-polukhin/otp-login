<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    public function otp()
    {
        return view('auth.otp');
    }
    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|string',
        ]);

        $user = User::find(session('otp:user:id'));
        if ($user && $user->otp === $request->otp && $user->otp_expires_at>=Carbon::now()) {
            $user->clearOtp();
            Auth::login($user);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['otp' => 'Invalid OTP or OTP has expired.']);
    }
}
