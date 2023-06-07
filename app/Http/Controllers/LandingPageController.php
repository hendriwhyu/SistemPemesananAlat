<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function home()
    {
        $dataUnit = Unit::limit(3)->orderBy('id', 'asc')->get();
        return view('index', ['DataUnit' => $dataUnit]);
    }
}
