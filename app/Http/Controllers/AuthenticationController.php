<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function signUpUser(Request $request)
    {
        $userAccountValidation = Validator::make($request->all(), [
            'user_role'        => 'required',
            'username'         => 'required|max:255',
            'email'            => 'email|unique:users,email',
            'password'         => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        if ($userAccountValidation->fails()) return response(['status' => 'warning', 'message' => implode('<br>', $userAccountValidation->errors()->all())]);

        try {
            User::create([
                'user_role' => $request->user_role,
                'username'  => trim($request->username),
                'email'     => trim($request->email),
                'password'  => Hash::make(trim($request->password)),
            ]);

            return redirect("/sign-in")->with('success', "User signed up successfully.");
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'An unexpected error occurred. Please try again later.'
            ]);
        }
    }

    private function checkUserAccount()
    {
        if (!Auth::check()) return back();

        $userAuthenticated = Auth::user();

        // 1 = super admin, 2 = admin, 3 = customer
        return redirect("/homepage")->with('success', "Welcome {$userAuthenticated->username}.");
    }

    public function landingPage()
    {
        return view('LandingPage');
    }
}
