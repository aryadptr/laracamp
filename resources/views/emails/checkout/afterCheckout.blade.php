@component('mail::message')
# Register Camp : {{ $checkout->camp->title }}

Hi, {{ $checkout->User->name }}

Thank you for registered on <b>{{ $checkout->camp->title }}</b>, please see payment instruction by click the button below.

@component('mail::button', ['url' => route('user.checkout.invoice', $checkout->id)])
Get Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
