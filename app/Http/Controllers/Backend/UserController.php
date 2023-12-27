<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUsers(){
        $users = User::all();
        return view('admin.show_user', compact('users'));
    }
    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function statusUser($id){
        $user = User::find($id);
        if($user->status == '1'){
            $user->status = '0';
            $user->update();
        }else{
            $user->status = '1';
            $user->update();
        }
        $notification = array(
            'message' => 'User Status Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
