<?php

namespace App\Http\Controllers;

use App\Mail\otpMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function registerOtpView()
    {
        return view('register');
    }

    public function sendMail(Request $request)
    {
        $this->validate($request , [
            'email' => ['required' , 'email']
        ]);

        $otp = random_int(11111 , 99999);

        $userQuery = User::query()->where('email' , $request->get('email'));

        if ($userQuery->exists()) {
            $user = $userQuery->first();

            $user->update([
                'password' => bcrypt($otp)
            ]);
        }
        else {
            $user = User::query()->create([
                'email' => $request->get('email'),
                'password' => bcrypt($otp),
                'role_id' => Role::findByTitle('user')->id
            ]);
        }

        Mail::to($user->email)->send(new otpMail($otp));

        Session::flash('success_message' , 'Code has sent successfully. Please check your e-mail');
        return redirect(route('verifyOtp' , $user));
    }

    public function verifyOtpView(User $user)
    {
        return view('verify' , [
            'user' => $user
        ]);
    }

    public function verifyOtp(Request $request , User $user)
    {
        if (! Hash::check($request->get('code') , $user->password)) {
            return redirect()->back()->withErrors(['Validation code is not correct']);
        }

        auth()->login($user);

        return redirect(route('dashboard'));
    }
}
