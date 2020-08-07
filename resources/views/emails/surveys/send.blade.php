@component('mail::message')

{!! $data['content'] !!}

@component('mail::button', ['url' => $data['url']])
Contestar encuesta
@endcomponent

@endcomponent
