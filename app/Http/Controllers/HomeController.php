<?php

namespace App\Http\Controllers;

use App\Navigation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $mainNav = Navigation::where('name', 'main')->first();
        return view('home', compact(['mainNav']));
    }
}
