<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class LogoutController extends Controller
{
    public function logout() {
        Sentinel::logout();
        return redirect()->route('login');
    }
}
