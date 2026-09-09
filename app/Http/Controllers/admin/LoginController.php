<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use illuminate\Http\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function showlogin()
    {
        // return 'Login Page Working';

        return view('admin.login');
    }


    public function login(Request $request)
    {

    $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required',

        ]);



       // google recaptcha
        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]
        );

        if (!$response->json('success')) {
            return back()
                ->withErrors(['g-recaptcha-response' => 'Please verify that you are not a robot.'])
                ->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('showLogin');
    }
}
