@component('mail::message')
#  ALERT <i class="material-icons" style="font-size:48px;color:red">warning</i>

Hello, {{ $username}}

@component('mail::button', ['url' => ''])
Visiter votre profile 
@endcomponent

Le capteur {{ $type }} dans la chambre {{$room_name}} a enregistrer {{ $value }} comme {{ $type }} à {{$measered_at}}. Cette valeur a dépassé la valeur maximale définie par l'utulisateur,  {{ $maxvalue}}.<br>
{{ config('app.name') }} Team .
@endcomponent
