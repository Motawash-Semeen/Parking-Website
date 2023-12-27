<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ParkingSlots;
use App\Models\Slots;
use App\Models\TransationInfo;
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
        $trans = TransationInfo::where('user_id', $id)->get();
        $trans_amount = TransationInfo::where('user_id', $id)->sum('amount');
        $trans_count = TransationInfo::where('user_id', $id)->count();
        $active_books = Slots::with('parkingSlots','info')->where('user_id', $id)->where('occupied', 'yes')->where('end_time', '>', time())->get();
        $slots = ParkingSlots::where('user_id', $id)->get();
        $profit = TransationInfo::with('slots')->get();
        $total_profit=0;
        foreach($profit as $p){
            if($p->slots->user_id == $id){
                $total_profit += $p->amount;
            }
        }
        $has_slot = ParkingSlots::where('user_id', $id)->exists();
        //return $active_books;
        return view('dashboard', compact('user','trans','slots','total_profit','has_slot','trans_amount','active_books','trans_count'));
    }
    public function service(){
        return view('service');
    }
    public function paymentPage(){
        return view('payments');
    }
    public function faqPage(){
        return view('faqPage');
    }
    public function privacyPage(){
        return view('privacy');
    }
}
