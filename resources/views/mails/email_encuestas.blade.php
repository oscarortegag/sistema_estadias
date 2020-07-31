<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Encuestas</title>
    <link rel="stylesheet" href="{{ asset("adminlte/bootstrap/dist/css/bootstrap.min.css") }}">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .content { text-align: center; }
        .title { font-size: 84px; }
    </style>
</head>
<body>

<p> Prueba de encuesa</p>

{!! $data['content'] !!}

<p> Para contestar la encuesta hacer <a href="{{ route("surveys.answer", ['id'=>$data['id']]) }}" class="btn btn-primary"><strong>Click aqui</strong></a></p>

</body>
<script src="{{ asset("adminlte/bootstrap/dist/js/bootstrap.min.js") }}"></script>
</html>
