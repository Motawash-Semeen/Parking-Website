<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class DashboardController extends Controller
{
    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'newPassword' => 'required|same:confirmPassword',
            'confirmPassword' => 'required',
        ],[
            'password.required' => 'Current password is required',
            'newPassword.required' => 'New password is required',
            'newPassword.same' => 'New password and confirm password does not match',
            'confirmPassword.required' => 'Confirm password is required',
        ]
        );
        $user = User::find(Auth::user()->id);
        if (Hash::check($request->password, $user->password)) {
            $user->password = Hash::make($request->newPassword);
            $user->update();
            $notification = array(
                'message' => 'Password changed successfully',
                'alert-type' => 'success'
            );
            Auth::logout();
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array(
                'message' => 'Password does not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function deleteUser(Request $request){
        $user = User::find(Auth::user()->id);
        if (Hash::check($request->passowrd, $user->passowrd)) {
            $user->delete();
            $notification = array(
                'message' => 'User deleted successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('/')->with($notification);
        }
        else{
            $notification = array(
                'message' => 'Password does not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function photoUpload(Request $request){
        
        $request->validate([
            'photo' => 'required|mimes:jpeg,png,jpg|max:5048',
        ],[
            'photo.required' => 'Photo is required',
            'photo.mimes' => 'Photo must be jpeg, png, jpg',
            'photo.max' => 'Photo size must be less than 5MB',
        ]
        );
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('photo')) {
            if($user->photo != null){
                unlink('frontend/assets/img/user/'.$user->photo);
            }
            $image = $request->file('photo');
            $imageName = time().'-user.'.$image->getClientOriginalExtension();
            $success = $image->move('frontend/assets/img/user/', $imageName);
            if($success){
                Image::make('frontend/assets/img/user/'.$imageName)->resize(300,300)->save('frontend/assets/img/user/'.$imageName);
            }
            $user->photo = $imageName;
            $user->update();
            $notification = array(
                'message' => 'Photo uploaded successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array(
                'message' => 'Photo is required',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
