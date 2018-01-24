<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Reminder;
use Mail;
use Sentinel;
use App\Mail\ForgotPasswordMail;

class ForgotPasswordController extends Controller
{
    
    public function forgotPassword() {
        return view('authentication.forgot-password');   
    }
    
    public function postForgotPassword(Request $request) {
        
        $user = User::whereEmail($request->email)->first();
        
        if (count($user) == 0) {
            return redirect()->route('login')->with([
                'success' => 'Şifre sıfırlama maili mail adresinize gönderildi.'
                ]);
        }
        
        $reminder = Reminder::exists($user) ?: Reminder::create($user);
        
        $this->sendEmail($user, $reminder->code);
        
        return redirect()->route('login')->with([
            'success' => 'Şifre sıfırlama maili mail adresinize gönderildi.'
            ]);
    }
    
    public function resetPassword($email, $resetCode) {
        
        $user = User::byEmail($email);

        if (count($user) == 0) 
            abort(404);
            
        if ($reminder = Reminder::exists($user)) {
            if ($resetCode == $reminder->code) 
                    return view('authentication.reset-password');
                else
                    return redirect()->route('home');
        } else {
            return redirect()->route('home');
        }

    }
    
    public function postResetPassword(Request $request, $email, $resetCode) {
        
        $request->validate([
            'password' => 'confirmed|required|min:5|max:30',
            'password_confirmation' => 'required|min:5|max:30',
        ]);
    
        $user = User::byEmail($email);

        if (count($user) == 0) 
            abort(404);
            
        if ($reminder = Reminder::exists($user)) {
            if ($resetCode == $reminder->code) {
                    Reminder::complete($user, $resetCode, $request->password);
                    return redirect()->route('login')->withSuccess('Başarılı. Yeni şifreniz ile giriş yapabilirsiniz.');
                } else {
                    return redirect()->route('home');
                }
        } else {
            return redirect()->route('home');
        }
        
    }
    
    private function sendEmail($user, $forgotPasswordCode) {
        
        Mail::to($user->email)->send(new ForgotPasswordMail($user, $forgotPasswordCode));
        
    }
    
}
