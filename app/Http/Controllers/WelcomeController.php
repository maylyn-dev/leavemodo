<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index() {
        if(Auth::guest()) {
            return view('welcome');
        } else {
            return redirect('dashboard');
        }
    }
}
