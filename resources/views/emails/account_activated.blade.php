@component('mail::message')
    Hi {{ $user->name }}

    This email confirms that your {{ config('app.name') }} account has been re-activated following our review. Your account
    access has been restored, and you may now log in using your credentials.

    Please refer to our Terms of Service for more information on our account policies.

    Regards,
    The {{ config('app.name') }} Team
@endcomponent
