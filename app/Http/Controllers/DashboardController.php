<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    // Where the user will edit the profile

    public function profile(){
        return view('user.profile');
    }

    public function password()
    {
        return view('user.password');
    }

    public function putProfile(Request $request)
    {   
        $this->validate($request, [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'email' => 'required|string|email|max:255'
        ]);


        $profile = User::find(auth()->id());
        $profile->fname = $request->input('fname');
        $profile->lname = $request->input('lname');
        $profile->specialty = $request->input('specialty');
        $profile->email = $request->input('email');
        $profile->save();

        session()->flash('message', 'Your profile has been updated');

        return redirect()->route('dashboard');

    }

    public function patchPassword(Request $request){
        $this->validate($request, [
            'oldPassword' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $oldPassword = $request->input('oldPassword');

        if (password_verify($oldPassword, auth()->user()->password)) {
            // Change Password
            $user = User::find(auth()->id());
            $user->password = bcrypt($request->input('password'));
            $user->save();


            session()->flash('message-warn', 'Your password has been changed');
            return redirect()->route('dashboard');
        } else {
            session()->flash('pass-error', 'Wrong Password');
            return redirect()->back();
        }
    }

    public function showClinicalAbstract()
    {
        $pdf = \PDF::loadView('medical.show');
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream();
    }
}
