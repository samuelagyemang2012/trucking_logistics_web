@component('mail::message')
Welcome to {{ config('app.name') }}!

Hi {{ $user->name }},

Your account is now active.

Welcome to our logistics platform! You now have full access to our complete suite of tools and services. 
You can start exploring available jobs, accepting new work, and managing your fleet directly from your dashboard.

We’re excited to help you streamline your transportation operations.

Best regards,  
The {{ config('app.name') }} Team
@endcomponent