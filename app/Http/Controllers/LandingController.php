<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    // LandingController.php
public function home() {
    $servicios = Servicio::all();
    return view('landing.home', compact('servicios'));
}

}
