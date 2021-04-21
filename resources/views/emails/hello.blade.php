@component('mail::message')
# Hello {{ auth()->user()->name }},

Greetings! The system automatically recorded your request This is Your Ticket ID: {{ $ticket->id }} please keep this record for your reference.<br>
Reason: {{ $reason }}
{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
