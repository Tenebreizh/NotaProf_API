<?php

namespace App\Http\Controllers;

use App\Appreciation;

class AppreciationController extends Controller
{

    public function index()
    {
        return Appreciation::all();
    }
}
