@component('mail::message')
# Sujet : {{$subject}}

<strong>Nom : </strong> {{$name}} <br>
<strong>Email : </strong> {{$email}} <br>
<strong>Message : </strong>
{{$message}}


@endcomponent
