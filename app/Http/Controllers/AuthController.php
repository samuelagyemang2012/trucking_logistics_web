<?php

namespace App\Http\Controllers;

use App\Mail\CompanyWelcomeEmail;
use App\Models\Company;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log; // Add this import
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showCompanyRegister()
    {
        return view('auth.register');
    }

    public function companyRegister(Request $request)
    {
        $rules = ([
            'name' => 'required|string|min:2',
            'email' => 'required|email|unique:users',
            'tin_number' => 'required|string|max:11|unique:companies',
            'telephone' => 'required|numeric|unique:users',
            'address' => 'required|string|max:300',
            'company_certificate' => 'file|extensions:pdf|nullable',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $this->validate($request, $rules);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'telephone' => $request->telephone,
            'address' => $request->address,
            'role_id' => 3,
            'status' => 11
        ]);

        // dd($user);

        Company::create([
            'user_id' => $user->id,
            'tin_number' => $request->tin_number,
            'company_certificate' => $request->company_certificate,
        ]);

        try {
            Mail::to($user->email)->queue(new CompanyWelcomeEmail($user));
        } catch (\Exception $e) {
            // dd($e->getMessage());
            Log::error('Failed to queue welcome email: ' . $e->getMessage()); // Remove leading backslash statrt mail queue: php artisan queue:work
        }

        return redirect()->route('show.login')->with('success', 'Your account has been created successfully. Please login.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($validated, $remember)) {
            $user = User::where('email', $request->email)->first();

            // if admin
            if ($user->role_id == 1) {
                if ($user->status == 12) {
                    $request->session()->regenerate();
                    return redirect()->route('admin.show.password.change')->with('info', 'Welcome! For your security, please change your password to get started.');
                } else {
                    // Auth::login();
                    $request->session()->regenerate();
                    return redirect()->route('admin.dashboard');
                }
            }

            //if company
            if ($user->role_id == 3) {
                //Check if account is verified
                //if not 
                if ($user->status == 12) {
                    return redirect()->route('show.login')->with('info', 'Your account has not be approved yet.');
                } else {
                    // Auth::login();
                    $request->session()->regenerate();
                    return redirect()->route('company.dashboard');
                }
            }

            return redirect()->route('show.login')->with('danger', 'Your are not authorized to perform this action.');
        } else {
            return redirect()->route('show.login')->with('danger', 'Invalid login credentials.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show.login');
    }

    public function showForgotPassword()
    {
        return view('auth.forgot_password');
    }

    public function forgotPassword(Request $request)
    {
        $rules = ([
            'email' => 'required|email'
        ]);

        $this->validate($request, $rules);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => __($status)])
            : back()->with(['danger' => __($status)]);
    }

    public function showResetPassword(string $token)
    {
        return view('auth.reset_password')->with('token', $token);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PasswordReset
            ? redirect()->route('show.login')->with('success', __($status))
            : back()->withErrors(['danger' => [__($status)]]);
    }
}
