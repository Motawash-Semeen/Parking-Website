<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // return $request->all();
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'username' => 'required',
        //     'nid' => 'required',
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'username' => $request->username,
        //     'nid' => $request->nid,
        //     'password' => Hash::make($request->password),
        // ]);

        $request->validate([
            'name' => 'required|max:255',
            'nid' => 'required|numeric|unique:users,nid',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:5|same:password_confirmation',
            'password_confirmation' => 'required|string|min:5',
        ],[
            'name.required'=> 'Please enter your name',
            'nid.required'=> 'Please enter your NID',
            'nid.unique'=> 'This NID already exists',
            'email.required' => 'Please enter your email',
            'email.unique' => 'This email already exists',
            'password.required' => 'Please enter your password',
            'password_confirmation.required' => 'Please re-enter your password',
            'password.required.same' => 'Password does not match',

        ]);
        $user = new User;
        $user->name = $request->name;
        $user->nid = $request->nid;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
