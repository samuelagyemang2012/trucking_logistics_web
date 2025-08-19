@component('mail::message')
    Your one-time password (OTP) for {{ config('app.name') }} is:

    #{{ $otp }}#

    This code is valid for 24 hours. Please do not share this code with anyone.

    If you did not request this code, please ignore this email.

    Thanks,
    The {{ config('app.name') }} Team
@endcomponent
