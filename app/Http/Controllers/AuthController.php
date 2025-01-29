<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLoginForm()
    {

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'nullable',
        ]);
        $user = User::where('email', $request->email)->first();

        if ($user) {

            if (!$user->hasVerifiedEmail()) {
                return back()->withErrors(['email' => 'Please verify your email first.']);
            }

            $otp = rand(100000, 999999);

            Otp::updateOrCreate(
                ['email' => $request->email],
                [
                    'otp' => $otp,
                    'otp_expires_at' => Carbon::now()->addMinutes(10),
                ]
            );

            // Send OTP to the user's email
            try {
                Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
                    $message->to($request->email)
                        ->subject('Your OTP for Login');
                });

                // Return view to enter OTP
                return view('auth.verify-otp', ['email' => $request->email])
                    ->with('success', 'OTP sent successfully. Please check your email.');
            } catch (\Exception $e) {
                return back()->with('error', 'Failed to send OTP. Please try again.');
            }
        }

        return back()->withErrors(['email' => 'The provided email does not match our records.']);
    }
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || $user->otp !== $request->otp || now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }

        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        Auth::login($user);
        return redirect()->route('crm.lead')->with('success', 'Logged in successfully.');
    }
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $email = $request->input('email');
        $otp = rand(100000, 999999);

        // Find user and update OTP
        $user = User::where('email', $email)->first();
        $user->otp = $otp;
        $user->otp_expires_at = Carbon::now()->addMinutes(10);
        $user->save();

        // Send OTP email
        try {

            Mail::send('emails.otp', ['otp' => $otp], function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Your OTP Code');
            });

            // Redirect with success message
            return redirect()->back()->with(['otp_sent' => true, 'email' => $email]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send OTP. Please try again.');
        }
    }


    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $request->id . ',id',
            'contact' => 'required|digits:10|unique:users,contact',
            // 'password' => 'required|string|min:6',

        ], [
            'email.unique' => 'The email address is already taken.',
            'contact.unique' => 'The contact number is already in use.',
            'contact.digits' => 'The contact number must be exactly 10 digits.',

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        //$user->password = bcrypt($request->password); 

        $user->save();

        // Send confirmation email
        Mail::send('emails.registration', ['user' => $user], function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Registration Successful');
        });

        return redirect()->route('login')->with('success', 'Registration successful. A confirmation email has been sent to your email address.');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
