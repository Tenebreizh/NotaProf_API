<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appreciation;

class AppreciationController extends Controller
{

    public function index()
    {
        return Appreciation::all();
    }

    public function store(Request $request)
    {
        $appreciation = Appreciation::create([
            'content' => $request->content,
            'category_id' => $request->category_id,
        ]);

        return $appreciation;
    }
}
