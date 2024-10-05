<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VendorAuthController extends Controller
{
    // Show the vendor registration form
    public function showRegistrationForm()
    {
        return view('auth.vendor_register');
    }

    // Handle vendor registration
    public function register(Request $request)
    {
        // Validate the registration request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:vendors',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new vendor
        Vendor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_approved' => false, // Set this to false initially; admin will approve later
        ]);

        return redirect()->route('vendor.login')->with('success', 'Registration successful. Please wait for admin approval.');
    }

    // Show the vendor login form
    public function showLoginForm()
    {
        return view('auth.vendor_login');
    }

    // Handle vendor login
    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find the vendor by email
        $vendor = Vendor::where('email', $request->email)->first();

        // Check if the vendor exists and is approved
        if ($vendor && $vendor->is_approved) {
            // Check if the password is correct
            if (Hash::check($request->password, $vendor->password)) {
                // Log the vendor in
                Auth::guard('vendor')->login($vendor); // Use vendor guard for logging in
                return redirect()->route('vendor.products.index'); // Redirect to product catalog after login
            }
        }

        // Return back with error messages
        return back()->withErrors(['email' => 'The provided credentials do not match our records or your account is not approved.']);
    }

    // Handle vendor logout
    public function logout()
    {
        Auth::guard('vendor')->logout(); // Use vendor guard for logging out
        return redirect()->route('vendor.login');
    }
}
