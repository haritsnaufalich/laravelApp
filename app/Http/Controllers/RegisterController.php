<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerIndex() {
        return view('register.index', [
            "title" => "Register",
            "active" => "Register"
        ]);
    }
}
