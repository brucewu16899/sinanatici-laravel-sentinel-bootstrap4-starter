<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use Mail;
use Illuminate\Mail\Mailable;
use App\Mail\ActivationMail;
use Validator;
use App\User;

class RegistrationController extends Controller
{
    
    public function register() {
        return view('authentication.register');
    }
    
    public function postRegister(Request $request) {
        
        $rules = [
            'email' => 'required|email|max:255|unique:users',
            'first_name' => 'max:255',
            'last_name' => 'max:255',
            'password' => 'required|min:5|max:30',
            'password_confirmation' => 'required|min:5|max:30|same:password',
        ];
                
        $messages = [
            'email.required' => 'E-mail adresi gerekli bir alandır.',
            'email.unique' => 'Bu e-mail adresi ile daha önce kayıt olunmuş.',
            
            'password.min' => 'Şifreniz en az :min karakter olmalıdır.',
            'password.max' => 'Şifreniz en fazla :max karakter olabilir.',
            'password_confirmation.min' => 'Şifreniz tekrarı en az :min karakter olmalıdır.',
            'password_confirmation.max' => 'Şifreniz tekrarı en fazla :max karakter olabilir.',
            'password.required' => 'Şifre gerekli bir alandır.',
            'password_confirmation.required' => 'Şifre tekrarı gerekli bir alandır.',
            'password.same' => 'Şifreler birbiriyle uyumsuz.',
            'password_confirmation.same' => 'Şifreler birbiriyle uyumsuz.',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages); 
        
        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }
            
        $user = Sentinel::register($request->all());
        
        $activation = Activation::create($user);
        
        $role = Sentinel::findRoleByName('Standart');
        
        $role->users()->attach($user);
        
        $this->sendEmail($user, $activation->code);
        
        return redirect()->route('login')->withSuccess('Kayıt başarılı ancak hesabınızı aktifleştirmeniz için size bir mail yolladık. Lütfen maildeki linki kullanarak hesabınızı aktifleştiriniz.');
    }
    
    private function sendEmail($user, $activationCode) {
        
        Mail::to($user->email)->send(new ActivationMail($user, $activationCode));
        
    }
}
