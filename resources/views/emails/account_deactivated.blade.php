@component('mail::message')
    Hi {{ $user->name }}

    This email is to inform you that your {{ config('app.name') }} account has been permanently deactivated by our
    administrative team.

    This action was taken due to a violation of our Terms of Service. As a result, you will no longer be able to log in,
    access, or use any features of the application.

    If you believe this deactivation was made in error, you may submit an appeal for our review. Please reply to this email
    to begin the appeal process.

    You can review our full Terms of Service here: [Link to Terms of Service].

    Sincerely,
    The {{ config('app.name') }} Team
@endcomponent
