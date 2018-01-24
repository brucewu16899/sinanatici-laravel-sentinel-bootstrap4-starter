<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\State;

class HomeController extends Controller
{
    public function index() {
        return view('home');
    }
}
