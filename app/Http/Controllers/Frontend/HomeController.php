<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\FAQ;
use App\Models\ParkingSlots;
use App\Models\Slots;
use App\Models\TransationInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function dashboard()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $trans = TransationInfo::where('user_id', $id)->orderBy('id', 'desc')->limit(5)->get();
        $trans_amount = TransationInfo::where('user_id', $id)->sum('amount');
        $trans_count = TransationInfo::where('user_id', $id)->count();
        
        $active_books = Slots::with('parkingSlots')->where('user_id', $id)->where('occupied', 'yes')->where('end_time', '>=', time())->orderBy('id', 'desc')->get();
        // $active_books = TransationInfo::with('slots', 'info')->where('user_id', $id)->where('end_time', '>=', $formattedDate)->orderBy('id', 'desc')->get();
        $cash_books = TransationInfo::with('info', 'users', 'slots')->where('payment_method', 'cash')->orderBy('id', 'desc')->limit(5)->get();
        $your_slot_books = TransationInfo::with('info', 'users', 'slots')->orderBy('id', 'desc')->limit(5)->get();

        $slots = ParkingSlots::where('user_id', $id)->get();
        $profit = TransationInfo::with('slots')->get();
        $total_profit = 0;
        foreach ($profit as $p) {
            if ($p->slots->user_id == $id) {
                $total_profit += $p->amount;
            }
        }
        $has_slot = ParkingSlots::where('user_id', $id)->exists();

        return view('dashboard', compact('user', 'trans', 'slots', 'total_profit', 'has_slot', 'trans_amount', 'active_books', 'trans_count', 'cash_books', 'your_slot_books'));
        //return $active_books;
    }
    public function service()
    {
        return view('service');
    }
    public function paymentPage()
    {
        return view('payments');
    }
    public function faqPage()
    {
        $faqs = FAQ::all();
        return view('faqPage', compact('faqs'));
    }
    public function privacyPage()
    {
        return view('privacy');
    }
    public function contactPage(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_no' => 'required',
            'message' => 'required',
        ]);
        $contact = new Contact;
        $contact->f_name = $request->first_name;
        $contact->l_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone_no;
        $contact->message = $request->message;
        $contact->save();

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'message' => $request->message,
        ];
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($data));
        $notification = array(
            'message' => 'Your message has been sent successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function googleService(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        //return $user->avatar;
        //print_r($user);   
        // Check if the user already exists in the database
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            // Create a new user in the database
            // $newUser = User::create([
            //     'name' => $user->name,
            //     'email' => $user->email,
            //     'nid' => '0-'.uniqid(),
            //     'photo' => $user->avatar,
            //     'email_verified_at' => now(),
            //     'password' => bcrypt(''),

            //     // Additional fields as needed
            // ]);
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->nid = '0-' . uniqid();
            $newUser->photo = $user->avatar;
            $newUser->email_verified_at = now();
            $newUser->password = bcrypt('');
            $newUser->save();


            auth()->login($newUser, true);
        }

        return redirect('/'); // Adjust the redirect URL as needed
    }
    public function nidStorePage()
    {
        return view('user_authentication');
    }
    public function nidStore(Request $request)
    {
        $request->validate([
            'nid' => 'required',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required',
        ], [
            'nid.required' => 'NID is required',
            'password.required' => 'Password is required',
            'confirm_password.required' => 'Confirm Password is required',
            'password.same' => 'Password and Confirm Password must be same',

        ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->nid = $request->nid;
        $user->password = Hash::make($request->password);
        $user->save();
        $notification = array(
            'message' => 'Your Info has been stored successfully',
            'alert-type' => 'success'
        );
        return redirect('profile')->with($notification);
    }
}
