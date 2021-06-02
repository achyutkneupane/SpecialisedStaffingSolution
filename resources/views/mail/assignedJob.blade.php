@component('mail::message')
# Job Assigned

Hello, {{ $job['worker']['name'] }}<br>
A job "<b>{{ $job['title'] }}</b>" has been assigned to you.

@component('mail::button', ['url' => route('viewJob',$job['id'])])
View Job Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
