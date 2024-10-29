<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function authUser(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) return $this->checkUserAccount();

        return back()->withInput()->with('warning', 'Incorrect User Credentials.');
    }

    public function signOut()
    {
        Auth::logout();
        session()->flush();
        return redirect('/')->with('success', 'Successfully Logged out.');
    }

    private function checkUserAccount()
    {
        if (!Auth::check()) return back();

        $userAuthenticated = Auth::user();

        // 1 = super admin, 2 =admin, 3 = reseller, 4 = customer
        if ($userAuthenticated->user_role == 4) {
            return redirect("/homepage")->with('success', "Welcome {$userAuthenticated->username}.");
        }
    }

    public function landingPage()
    {
        return view('LandingPage');
    }
}
