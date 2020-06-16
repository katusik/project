<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;

class ApplicationController extends Controller
{
    public function index() {
        $tours = Tour::all();
        return view('page.application.application', compact('tours'));
    }
}
