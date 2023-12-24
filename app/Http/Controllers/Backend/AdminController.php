<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ParkingImage;
use App\Models\ParkingSlots;
use App\Models\Slots;
use App\Models\TransationInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $user = Auth::user();
        $total_slots = Slots::count();
        $total_price = TransationInfo::sum('amount');
        $total_user = User::count();
        $total_empty = Slots::where('occupied','no')->count();
        $top_transaction = TransationInfo::orderBy('id','desc')->take(5)->get();
        $total_trans = TransationInfo::count();
        $percentage_card = (TransationInfo::where('payment_method','Stripe')->count()/ $total_trans) * 100;
        $percentage_cash = (TransationInfo::where('payment_method','Cash')->count()/  $total_trans) * 100;
        $percentage_online = (TransationInfo::where('payment_method','Online')->count()/ $total_trans) * 100;

        return view('admin.admin_dashboard', compact('user','total_slots','total_price','total_user','total_empty','top_transaction','percentage_card','percentage_cash','percentage_online'));
    }
    public function AdminProfile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ],
    [
        'name.required' => 'Name is required',
        'number.required' => 'Number is required',
        'image.required' => 'Image is required',
        'image.image' => 'Image must be an image',
        'image.mimes' => 'Image must be jpeg,png,jpg',
        'image.max' => 'Image must be less than 2 MB',
        'number.numeric' => 'Number must be digit',
    ]);
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->number = $request->number;
        $user->nid = $request->nid;
        $request->address ? $user->address = $request->address : '';
        if ($request->hasFile('image')) {
            if($user->photo != null){
                unlink('frontend/assets/img/user/'.$user->photo);
            }
            $image = $request->file('image');
            $imageName = time() . '-user.' . $image->getClientOriginalExtension();
            $success = $image->move('frontend/assets/img/user/', $imageName);
            if($success){
                Image::make('frontend/assets/img/user/'.$imageName)->resize(300,300)->save('frontend/assets/img/user/'.$imageName);
            }
            $user->photo = $imageName;
        }
        $user->update();
        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
}
