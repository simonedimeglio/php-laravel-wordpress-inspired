<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    
    public function publicSection() {
        return view('public');
    }

        
    public function privateSection() {

        if(!Auth::check()) {
            return redirect()->route('login');
        }
        return view('private');
    }

}