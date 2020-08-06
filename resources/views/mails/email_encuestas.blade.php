<!doctype html>
<html lang="es">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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

{!! $data['content'] !!}

<p> Para contestar la encuesta hacer click <a href="{{ $data['url'] }}" class="btn btn-primary"><strong>aqui</strong></a></p>

</body>
</html>
