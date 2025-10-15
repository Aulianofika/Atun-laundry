<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /** FORM LOGIN */
    public function loginForm()
    {
        return view('auth.login');
    }

    /** PROSES LOGIN */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);

            // arahkan sesuai role
            if ($user->role == 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/customer/home');
            }
        }

        return back()->with('error', 'Email atau password salah!');
    }

    /** FORM REGISTER */
    public function registerForm()
    {
        return view('auth.register');
    }

    /** PROSES REGISTER */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'customer';
        $user->save();

        Auth::login($user);
        return redirect('/login')->with('success', 'Akun berhasil dibuat. Silakan login untuk melanjutkan.');
}

    /** FORM LUPA PASSWORD */
public function forgotForm()
{
    return view('auth.forgot_password');
}

/** PROSES RESET PASSWORD LANGSUNG */
public function resetPassword(Request $request)
{
    $request->validate([
        'email'=>'required|email|exists:users,email',
        'password'=>'required|min:6|confirmed'
    ]);

    $user = User::where('email',$request->email)->first();
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect('/login')->with('success','Password berhasil direset. Silakan login.');
}
    /** LOGOUT */
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}