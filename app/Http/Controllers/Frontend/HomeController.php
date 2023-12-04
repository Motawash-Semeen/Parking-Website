<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function dashboard(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard', compact('user'));
    }
}
