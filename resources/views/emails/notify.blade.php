@component('mail::message')
# Hello smartwems user,

Ticket Update: {{ $remarks }} 
<br> 
Ticket Status: {{ $status }} 
please keep this record for your reference.<br>

This is system generated email - SmartWEM Bot.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
