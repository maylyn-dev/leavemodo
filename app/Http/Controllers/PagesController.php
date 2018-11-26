<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('pages.dashboard');
    }

    public function people() {
        $users = User::all();

        return view('pages.people', compact('users'));
    }



}
