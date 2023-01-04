<?php

namespace App\Http\Controllers;

use App\Events\birthdayevent;
use Illuminate\Http\Request;
use App\Models\User;

class Icontroller extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function signup_form(Request $request)
    {
        $add = new User;
        if ($request->isMethod('post')) {
            $add->name = $request->get('name');
            $add->email = $request->get('email');
            $add->dob = $request->get('dob');
            $add->password = $request->get('password');

            if (User::where('email', $add->email)->exists()) {
                return back()->with('error', 'Account already exist!');
            } else {
                $add->save();
                $request->session()->put('useremail', $add->email);
                return redirect("login")->with('success', 'Sign Up successfully.');
            }
        }
    }
    public function login()
    {
        return view('login');
    }
    public function login_form(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $data = User::select('*')->where('email', $email)
            ->where('password', $password)
            ->first();
        if (!empty($data)) {
            return redirect("home")->with('success', 'Login Successful.');
        } else {
            return back()->with('error', 'Check your details!!');
        }
    }
    public function send()
    {
        $data = ['username' => 'palak', 'email' => 'palak@gmail.com'];
        event(new birthdayevent($data));
        return view('emailsend');
    }
    public function home()
    {
        return view('home');
    }
}
