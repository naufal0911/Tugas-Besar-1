<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index()
    {
        return view('coba', [
            'title' => 'Home',
            'active' => 'home'
        ]);
    }
    public function authenticate(Request $request)
    {
        
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);
            if (Auth::attempt($credentials)) {
                if (Auth::user()->hak == 1) {
                    $request->session()->regenerate();
                    return redirect()->intended('/Dashboard');
                } elseif (Auth::user()->hak == 0) {
                    $request->session()->regenerate();
                    $request->session()->invalidate();
                     $request->session()->regenerateToken();
                    return back()->with('error', 'Akun Belum Disetujui Oleh Admin !');
                } 
            }
            return back()->with('error', 'Login Failed!');

    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
// Redirect ke Google untuk otentikasi
public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}

// Callback dari Google setelah otentikasi berhasil
public function handleGoogleCallback()
{
    try {
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            // Buat user baru
            $newUser = User::create([
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
                'password' => bcrypt('dummy_password'), // Set password sembarang
                'group_id' => '2',
                'hak' => '2'
            ]);

            Auth::login($newUser);
        }

        return redirect()->intended('/Dashboard'); // Redirect ke halaman dashboard setelah login
    } catch (\Exception $e) {
        return back()->with('error', 'Login Failed!');
    }
}
}
