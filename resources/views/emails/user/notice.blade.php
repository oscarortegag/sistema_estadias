@component('mail::message')

    Dentro de los procesos que se realizan en la universidad tecnológica de chetumal es importante mantener una comunicación constante
    con los alumnos egresados, es por esto que te enviamos los datos de usuario para tener acceso al sistema de seguimiento a egresados.

    Nombre: {{ $data['nombre'] }}

    Usuario: {{ $data['usuario'] }}

    Contraseña: {{$data['password']}}

@component('mail::button', ['url' => $data['url']])
Validar datos
@endcomponent


@endcomponent
