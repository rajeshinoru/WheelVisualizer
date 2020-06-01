<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleCaptchaController extends Controller{
    public function googlecaptchaRegister(){
        return view('googleCaptcha');
    }
    public function googlecaptchaRegisterPost(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        return "Successfully check google reCAPTCHA";
    }
}
