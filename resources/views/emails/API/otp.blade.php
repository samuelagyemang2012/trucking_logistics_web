@component('mail::message')
    Hi {{ $name }}

    Welcome to the {{ config('app.name') }} family. In order to activate your account, please
    use the following one-time password (OTP) to complete your sign-up:

    #{{ $otp }}#

    This code is valid for the next 24 hours. For your security, please do not share this code with others.

    If you didn't initiate this request, please contact our support team immediately.

    Best regards,
    The {{ config('app.name') }} Team
@endcomponent
