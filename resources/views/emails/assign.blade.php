@component('mail::message')
# Hello {{ auth()->user()->name }},

Greetings! Ticket ID: {{ $ticket }} is successfully assigned to one of our maintenance staff <br> please keep this record for your reference.<br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
