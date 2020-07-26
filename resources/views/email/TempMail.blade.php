@component('mail::message')
#  ALERT <i class="material-icons" style="font-size:48px;color:red">warning</i>

Hello, {{ $username}}

@component('mail::button', ['url' => ''])
Visit your profile 
@endcomponent

The sensor of {{ $type }} in {{$room_name}} room recorded a {{ $value }} as {{ $type }} at {{$measered_at}} and this record passed the max value defined by
the user which is {{ $maxvalue}} ,So it is better to chech your room to avoid any accidents .<br>
{{ config('app.name') }} Team .
@endcomponent
