<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StudentDetail;
use App\Models\TeacherDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $registerRole = $request->input('register_role', 'student');

            $request->validateWithBag('register', [
                'register_role'    => ['required', Rule::in(['student', 'teacher'])],
                'first_name'       => 'required|string|max:50',
                'last_name'        => 'required|string|max:50',
                'username'         => [
                    'required',
                    'string',
                    'max:50',
                    Rule::unique($registerRole === 'teacher' ? 'teacher_details' : 'student_details', 'username'),
                ],
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
                'qualification'    => 'nullable|string|max:255',
                'experience'       => 'nullable|string|max:255',
                'specialization'   => 'nullable|string|max:255',
                'bio'              => 'nullable|string|max:2000',
                'profile_image'    => 'nullable|image',
                'terms'            => 'accepted'
            ]);

            $user = User::create([
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'role'     => $registerRole,
                'account_status' => 'pending',
            ]);

            $imagePath = null;
            if ($request->hasFile('profile_image')) {
                $file        = $request->file('profile_image');
                $filename    = time() . '_' . $file->getClientOriginalName();
                $destination = public_path($registerRole === 'teacher' ? 'uploads/teachers' : 'uploads/students');
                $file->move($destination, $filename);
                $imagePath = ($registerRole === 'teacher' ? 'uploads/teachers/' : 'uploads/students/') . $filename;
            }

            if ($registerRole === 'teacher') {
                TeacherDetail::create([
                    'user_id' => $user->id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'username' => $request->username,
                    'phone' => $request->phone,
                    'profile_image' => $imagePath,
                    'qualification' => $request->qualification,
                    'experience' => $request->experience,
                    'specialization' => $request->specialization,
                    'bio' => $request->bio,
                ]);
            } else {
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
            }

            $msg = $registerRole === 'teacher'
                ? 'Teacher application submitted successfully. You can login after admin approval.'
                : 'Registration submitted successfully. You can login after admin approval.';

            return redirect()
                ->route('home')
                ->with('auth_success', $msg);
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('auth_error', 'Something went wrong. Please try again.')
                ->with('openAuthModal', 'register');
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
        $request->validateWithBag('login', [
            'login'    => 'required',
            'password' => 'required'
        ]);

        $credentials = filter_var($request->login, FILTER_VALIDATE_EMAIL)
            ? ['email' => $request->login, 'password' => $request->password]
            : ['username' => $request->login, 'password' => $request->password];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $user = Auth::user();

            if (in_array($user->role, ['student', 'teacher'], true) && $user->account_status !== 'approved') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                $msg = $user->account_status === 'rejected'
                    ? 'Your account has been rejected by admin.'
                    : 'Your account is pending admin approval.';

                return back()
                    ->withInput()
                    ->with('auth_error', $msg)
                    ->with('openAuthModal', 'login');
            }

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

        return back()
            ->withInput()
            ->withErrors(['login' => 'Invalid username/email or password.'], 'login')
            ->with('openAuthModal', 'login');
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