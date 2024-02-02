<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\FAQ;
use App\Models\ParkingImage;
use App\Models\ParkingSlots;
use App\Models\Slots;
use App\Models\SocialLinks;
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
        $total_empty = Slots::where('occupied','no')->orWhere('end_time','<=', time())->orWhere('end_time', null)->count();
        $top_transaction = TransationInfo::orderBy('id','desc')->take(5)->get();
        $total_trans = TransationInfo::count();
        $percentage_card = (TransationInfo::where('payment_method','Stripe')->count()/ $total_trans) * 100;
        $percentage_cash = (TransationInfo::where('payment_method','Cash')->count()/  $total_trans) * 100;
        $percentage_online = (TransationInfo::where('payment_method','Online')->count()/ $total_trans) * 100;
        $count_card = TransationInfo::where('payment_method','Stripe')->count();
        $count_cash = TransationInfo::where('payment_method','Cash')->count();
        $count_online = TransationInfo::where('payment_method','Online')->count();

        
        $daysearnings = TransationInfo::selectRaw('DATE(created_at) as date, SUM(amount) as total_amount')
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->limit(5);

        return view('admin.admin_dashboard', compact('user','total_slots','total_price','total_user','total_empty','top_transaction','percentage_card','percentage_cash','percentage_online','daysearnings','count_card','count_cash','count_online'));
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
    public function getCartData(){
        $daysearnings = TransationInfo::selectRaw('DATE(created_at) as y, SUM(amount) as a')
        ->groupBy('y')
        ->orderBy('y', 'asc')
        ->limit(5)
        ->get();
        return $daysearnings;
    }
    public function getLinkData(){
        $links = SocialLinks::where('id',1)->first();
        return view('admin.show_links',compact('links'));
    }
    public function storeLinkData(Request $request){
        $links = SocialLinks::where('id',1)->first();
        $links->facebook = $request->facebook;
        $links->twitter = $request->twitter;
        $links->linkedin = $request->linkedin;
        $links->behance = $request->behance;
        $links->dribbble = $request->dribbble;
        $links->update();
        $notification = array(
            'message' => 'Links Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function getContactData(){
        $messages = Contact::orderBy('id','desc')->get();
        return view('admin.show_contacts',compact('messages'));
    }
    public function deleteContactData($id){
        $message = Contact::find($id);
        $message->delete();
        $notification = array(
            'message' => 'Message Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function getFAQData(){
        $faqs = FAQ::orderBy('id','desc')->get();
        return view('admin.show_faqs',compact('faqs'));
    }
    public function storeFAQData(Request $request, $id=null){
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
        ]);
        //return $request->all();
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($id != null){
            $faq = FAQ::find($request->id);
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->update();
            $notification = array(
                'message' => 'FAQ Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect('admin/all-faq')->with($notification);
        }
        $faq = new FAQ();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        $notification = array(
            'message' => 'FAQ Added Successfully',
            'alert-type' => 'success'
        );
        return redirect('admin/all-faq')->with($notification);
    }
    public function updateFAQData($id=null){
        if($id == null){
            return view('admin.update_faq');
        }
        $faq = FAQ::find($id);
        return view('admin.update_faq',compact('faq'));
    }
    
    
    public function deleteFAQData($id){
        $faq = FAQ::find($id);
        $faq->delete();
        $notification = array(
            'message' => 'FAQ Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
}
