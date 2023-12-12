<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function inputPage()
    {
        return view('allservice');
    }

    public function resultPage(Request $request)
    {
        $location = $request->input('location');
        return view('result', compact('location'));
    }
    public function directionPage()
    {
        return view('direction');
    }
    public function addParking()
    {
        return view('addparking');
    }
}
