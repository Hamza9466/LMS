<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StudentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            // ✅ Validate input (unchanged)
            $request->validate([
                'first_name'       => 'required|string|max:50',
                'last_name'        => 'required|string|max:50',
                'username'         => 'required|string|max:50|unique:student_details',
                'email'            => 'required|email|unique:users',
                'password'         => 'required|min:6|confirmed',
                'phone'            => 'nullable|string|max:20',
                'gender'           => 'nullable|string|in:male,female,other',
                'dob'              => 'nullable|date',
                'address'          => 'nullable|string|max:255',
                'city'             => 'nullable|string|max:100',
                'country'          => 'nullable|string|max:100',
                'institute_name'   => 'nullable|string|max:255',
                'program_name'     => 'nullable|string|max:255',
                'enrollment_year'  => 'nullable|integer',
                'profile_image'    => 'nullable|image',
                'terms'            => 'accepted'
            ]);

            // ✅ Create User (unchanged)
            $user = User::create([
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'role'     => 'student',
            ]);

            // ✅ Handle Image Upload (unchanged)
            $imagePath = null;
            if ($request->hasFile('profile_image')) {
                $file        = $request->file('profile_image');
                $filename    = time() . '_' . $file->getClientOriginalName();
                $destination = public_path('uploads/students');
                $file->move($destination, $filename);
                $imagePath = 'uploads/students/' . $filename;
            }

            // ✅ Save student details (unchanged)
            StudentDetail::create([
                'user_id'         => $user->id,
                'first_name'      => $request->first_name,
                'last_name'       => $request->last_name,
                'username'        => $request->username,
                'phone'           => $request->phone,
                'gender'          => $request->gender,
                'dob'             => $request->dob,
                'address'         => $request->address,
                'city'            => $request->city,
                'country'         => $request->country,
                'institute_name'  => $request->institute_name,
                'program_name'    => $request->program_name,
                'enrollment_year' => $request->enrollment_year,
                'profile_image'   => $imagePath,
            ]);

            // ✅ Login and smart redirect to checkout
            Auth::login($user);
            $request->session()->regenerate();

            // Prefer hidden intended; else go to checkout if cart exists; else home
            $target = $request->input('intended');
            if (!$target && !empty(session('cart', []))) {
                $target = route('cart.checkout');
            }
            if (!$target) {
                $target = route('home');
            }

            return redirect()->to($target)->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function checkoutGate(Request $request)
    {
        // Keep setting the active tab for your gate page (unchanged)
        if ($request->filled('tab')) {
            $tab = in_array($request->get('tab'), ['login','register']) ? $request->get('tab') : 'register';
            session(['tab' => $tab]);
        }

        // Your blade reads request('intended') itself, so no need to pass it explicitly
        return view('website.pages.cart.checkout-auth');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login'    => 'required',
            'password' => 'required'
        ]);

        $credentials = filter_var($request->login, FILTER_VALIDATE_EMAIL)
            ? ['email' => $request->login, 'password' => $request->password]
            : ['username' => $request->login, 'password' => $request->password];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Prefer hidden intended; else checkout if cart exists; else your original dashboard fallback
            $target = $request->input('intended');
            if (!$target && !empty(session('cart', []))) {
                $target = route('cart.checkout');
            }
            if (!$target) {
                $target = route('dashboard');
            }

            return redirect()->to($target);
        }

        return back()->with('error', 'Invalid username/email or password.');
    }

    public function showLogin()
    {
        // unchanged
        return view('website.home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}