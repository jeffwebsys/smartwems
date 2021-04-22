@component('mail::message')
# Hello smartwems user,

Supply Officer Update: {{ $report->report }} 
<br> 
Procurement ID: {{ $procurement }} 
please keep this record for your reference.<br>

This is system generated email - SmartWEM Bot.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
