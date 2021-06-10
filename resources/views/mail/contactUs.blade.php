@component('mail::message')
# Contact Us Message
<b>{{ $info['name'] }}</b> has sent a contact message.<br><br>
<b>Name</b>: {{ $info['name'] }}<br>
<b>Email</b>: {{ $info['email'] }}<br>
<b>Message</b>: {{ $info['message'] }}<br>
@endcomponent
