@component('mail::message')
    Hi {{ $user->name }}

    This email serves as a final confirmation that your request to delete your account has been completed.

    All of your personal information, saved content, and data associated with your {{ config('app.name') }} account have
    been removed from our systems.

    We're sorry to see you go, and we wish you all the best.

    Thank you,
    The {{ config('app.name') }} Team
@endcomponent
