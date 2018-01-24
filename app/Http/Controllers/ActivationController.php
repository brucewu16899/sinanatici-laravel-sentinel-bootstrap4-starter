<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Activation;
use App\User;

class ActivationController extends Controller
{
    public function activate($email, $activationCode) {
        
        $user = User::where(['email'=>$email])->first();
        
        if ($user) {
            if (Activation::complete($user, $activationCode)) {
                return redirect()->route('login')->withSuccess('Hesabınız başarı ile aktifleştirildi.');
            } else {
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }
        
        
    }
}
