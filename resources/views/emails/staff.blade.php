@component('mail::message')
@if($name2)
# Hello {{ $name2 }}, 
@else
# Hello {{ $name }},  
@endif

@if($name2)
Greetings! You have one assigned ticket please have a look! <br> Ticket ID: {{ $ticket }} <br> please keep this record for your reference.<br>
@else
Greetings! Ticket successfully assigned to one of our maintenance team! <br> Ticket ID: {{ $ticket }} <br> please keep this record for your reference.<br>
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
