<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormregisterController extends Controller
{
    public function formRegister(){
        return view('form_register');
    }
}
