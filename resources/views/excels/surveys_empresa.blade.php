<p>Nombre:</p> {{ $survey->displayName }}
<p>Descripción:</p> {!!  $survey->description !!}
<br/>
<table>
    <thead>
    <tr>
    <th>Nombre Completo</th>
    <th>Nombre de representante</th>
    <th>Asesor de negocio</th>
    <th>Email</th>
    @foreach($survey->questions as $question)
        <th>{!! $question->content !!}</th>
    @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($empresas as $empresa)
        <tr>
            <td>{{$empresa->companyName}}</td>
            <td>{{$empresa->representativeName}}</td>
            <td>{{$empresa->businessAdvisorName}}</td>
            <td>{{$empresa->businessAdvisorEmail}}</td>
            @foreach($survey->questions as $question)
                <th>{{ isset($respuestas[$empresa->enterprise_id][$question->id]) ? $respuestas[$empresa->enterprise_id][$question->id] : " " }}</th>
            @endforeach
        </tr>
    @endforeach
    </tbody>

</table>
