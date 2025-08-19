@component('mail::message')
Welcome to {{ config('app.name') }}!

Hi {{ $user->name }},

Your account has been created and is now pending approval from our administration team. We'll send you an email as soon as it's been approved, and you'll be able to log in and access all of our logistics tools and services.

In the meantime, feel free to explore our website and learn more about how {{ config('app.name') }} can streamline your shipping and transportation needs.

We look forward to helping you move your business forward.

Best regards,  
The {{ config('app.name') }} Team
@endcomponent