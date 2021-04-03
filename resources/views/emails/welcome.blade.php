@component('mail::message')
# Hello from JRS Development Team

Welcome to our cool application {{ $username }}
{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
