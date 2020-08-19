<p>Nombre:</p> {{ $survey->displayName }}
<p>Descripción:</p> {!!  $survey->description !!}
<br/>
<table>
    <thead>
    <tr>
    <th>Nombre Completo</th>
    <th>Dirección de correo electrónico</th>
    <th>Matricula</th>
    <th>Sexo</th>
    <th>Programa Educativo</th>
    <th>Fecha de nacimiento</th>
    <th>Domicilio actual</th>
    <th>Estado</th>
    <th>Municipio</th>
    <th>Código postal</th>
    <th>Teléfono domicilio</th>
    <th>Teléfono Celular</th>
    <th>Correo electrónico personal</th>
    <th>Facebook</th>
    <th>Nombre familiar</th>
    <th>Teléfono domicilio familiar</th>
    <th>Teléfono celular familiar</th>
    @foreach($survey->questions as $question)
        <th>{!! $question->content !!}</th>
    @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($alumnos as $alumno)
        <tr>
            <td>{{$alumno->nombre}}</td>
            <td>{{$alumno->institutionalEmail}}</td>
            <td>{{$alumno->enrollment}}</td>
            <td>{{$alumno->genero}}</td>
            <td>{{$alumno->programa_educativo}}</td>
            <td>{{$alumno->dateOfBirth}}</td>
            <td>{{$alumno->address}}</td>
            <td>{{$alumno->estado_republica}}</td>
            <td>{{$alumno->township}}</td>
            <td>{{$alumno->zip_code}}</td>
            <td>{{$alumno->homePhone}}</td>
            <td>{{$alumno->cellPhone}}</td>
            <td>{{$alumno->personalEmail}}</td>
            <td>{{$alumno->facebook}}</td>
            <td>{{$alumno->name_family}}</td>
            <td>{{$alumno->homePhone_family}}</td>
            <td>{{$alumno->cellPhone_family}}</td>
            @foreach($survey->questions as $question)
                <th>{{ isset($respuestas[$alumno->student_id][$question->id]) ? $respuestas[$alumno->student_id][$question->id] : " " }}</th>
            @endforeach
        </tr>
    @endforeach
    </tbody>

</table>
