@component('mail::message')
# Reply to your message

{{$answer}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
