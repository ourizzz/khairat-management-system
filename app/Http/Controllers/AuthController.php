<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    // Show login page
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            // Admin must use the separate Admin Login page
            if ($user->role === 'admin') {
                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'email' => 'Administrator accounts must use the Admin Login page.',
                ]);
            }

            $request->session()->regenerate();

            if ($user->role === 'member') {
                return redirect()->route('member.dashboard');
            }

            // Normal user
            return redirect()->route('normal.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Show admin login page
    public function showAdminLogin()
    {
        return view('auth.admin-login');
    }

    // Handle admin login
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'admin_id' => 'required|string',
            'password' => 'required',
        ]);

        $user = User::where('admin_id', $credentials['admin_id'])
            ->where('role', 'admin')
            ->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()
            ->withErrors([
                'admin_id' => 'The Admin ID or password is incorrect.',
            ])
            ->onlyInput('admin_id');
    }

    // Show register page
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle register
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\pL\s\'-]+$/u',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
        ], [
            'name.regex' => 'The name may only contain letters, spaces, hyphens, and apostrophes.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
        ]);

        $user = User::create([
            'name' => mb_strtoupper(trim($validated['name'])),
            'email' => strtolower(trim($validated['email'])),
            'password' => Hash::make($validated['password']),
            'role' => 'normal',
        ]);
        return redirect()->route('login')
     ->with('success', 'Account registered successfully. Please log in to continue.');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}