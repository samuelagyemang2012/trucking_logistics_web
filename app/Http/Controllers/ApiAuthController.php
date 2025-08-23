<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivateAccountRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Mail\NewOTPEmail;
use App\Mail\OTPEmail;
use App\Models\OTP;
use App\Models\User;
use App\Traits\HTTPResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;

class ApiAuthController extends Controller
{
    use HTTPResponses;

    public function index()
    {
        return response()->json([
            'message' => config('app.name') . " api v.1"
        ]);
    }

    public function register(UserRequest $request)
    {
        $request->validated($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'telephone' => $request->telephone,
            'gender' => $request->gender,
            'national_id' => $request->national_id,
            'id_number' => $request->id_number,
            'address' => $request->address,
            'role_id' => 2,
            'status' => 12
        ]);

        //Send OTP to email
        $otp = random_int(100000, 999999);
        OTP::create([
            'email' => $user->email,
            'code' => bcrypt($otp)
        ]);

        try {
            Mail::to($user->email)->queue(new OTPEmail($otp, $user->name));
        } catch (\Exception $e) {
            Log::error('Failed to queue welcome email: ' . $e->getMessage()); // Remove leading backslash statrt mail queue: php artisan queue:work
        }

        return $this->success([
            'user_id' => $user->id,
            'status' => $user->status,
            'token' => $user->createToken('api_token:' . $user->email)->plainTextToken
        ]);
    }

    public function login(LoginRequest $request)
    {
        $request->validated($request->all());

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return $this->error('', 'Credentials do not match.', 401);
        }

        $user = User::where('email', $request->email)->first();

        return $this->success([
            'user_id' => $user->id,
            'status' => $user->status,
            'token' => $user->createToken('api_token:' . $user->email)->plainTextToken
        ]);
    }

    public function activateAccount(ActivateAccountRequest $request)
    {
        $request->validated($request->all());

        $otp = OTP::where(['email' => $request->email])->first();

        // check for otp
        if ($otp) {
            //validate otp
            if (Hash::check($request->otp_code, $otp->code)) {

                //check otp age
                $age = $otp->created_at->diffInDays(now());

                if ($age > 1) {
                    return $this->error('', 'The OTP is expired.', 401);
                }

                //update here status to active
                $user = User::where(['email' => $request->only(['email'])])->first();

                if ($user) {
                    $user->status = 11;
                    $user->save();
                }

                //delete otp
                OTP::where('id', $otp->id)->delete();

                return $this->success([
                    'user_id' => $user->id,
                    'status' => $user->status,
                ], 'Account activated');
                // $diffHuman = Carbon::parse($timestamp)->diffForHumans();
            }
            return $this->error('', 'The OTP is invalid.', 401);
        }

        return $this->error('', 'The OTP does not exists.', 401);
    }

    public function newOTP(Request $request)
    {
        $rules = [
            'email' => 'required|email'
        ];

        $this->validate($request, $rules);

        $otp = random_int(100000, 999999);

        $user = User::where(['email' => $request->email])->first();

        if ($user) {
            if ($user->status == 11) {
                return $this->error('', 'The account is already activated.', 401);
            }

            OTP::create([
                'email' => $request->email,
                'code' => bcrypt($otp)
            ]);

            try {
                Mail::to($user->email)->queue(new NewOTPEmail($otp));
            } catch (\Exception $e) {
                Log::error('Failed to queue welcome email: ' . $e->getMessage()); // Remove leading backslash statrt mail queue: php artisan queue:work
            }

            return $this->success('', 'New OTP has been generated');
        }
        return $this->error('', 'The account is does not exist.', 401);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->success('', 'Logout successful. Your token has been destroyed.');
    }

    public function test()
    {
        return config('app.name');
    }
}
