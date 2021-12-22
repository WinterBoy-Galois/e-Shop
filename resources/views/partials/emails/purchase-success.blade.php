@component('mail::message')

Thank You!

Thank You For Shopping With e-shop


@component('mail::button', ['url' => 'test'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
