<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Validator;

class LoginController extends Controller
{
    public function login() {
        
        return view('authentication.login');
        
    }
    public function postLogin(Request $request) {

        try {
            
            $rememberMe = false;
            
            if (isset($request->remember_me)) 
                $rememberMe = true;
            
            if (Sentinel::authenticate($request->all(), $rememberMe)) {
                
                return redirect()->route('home');
            
            } else {
                
                return redirect()->back()->with(['error' => 'Kullanıcı adı ya da şifre hatalı']);
                
            }
            
        } catch (ThrottlingException $e) {
            
            $delay = $e->getDelay();
            return redirect()->back()->with(['error' => "$delay saniye uzaklaştırıldınız."]);
            
        } catch (NotActivatedException $e) {
            
            return redirect()->back()->with(['error' => "Hesap pasif. Mail aktivasyonu gerekmektedir. Lütfen size gönderdiğimiz aktivasyon mailindeki aktifleştirme linkine tıklayınız."]);
            
        }
        
    }

}
