<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app.name')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset("adminlte/bootstrap/dist/css/bootstrap.min.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset("css/fontello.css") }}">

    <link rel="stylesheet" href="{{ asset("adminlte/css/AdminLTE.min.css") }}">
    <link rel="stylesheet" href="{{ asset("adminlte/plugins/iCheck/square/_all.css") }}">
    @stack('styles')

<style>
    .encabezado
    {
        position: fixed;
        left: 0; /* Posicionamos la cabecera al lado izquierdo */
        top: 0;
        width: 100%;
        height: 150px;
        text-align:center;
        background-color: #00ab84;
        min-height: 80px;
        color:#ffffff;
        padding-bottom:    200px;
        z-index: 200;
    }

    .encabezado>span {
        display:inline-block;
        vertical-align:middle;
        line-height:normal;
        font-size: 2em;
        font-family: Arial;
    }

    .footer{
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 50px;
        padding-bottom: 16px;
        background: #111;
        background-color: #00ab84;
        border-top: 2px solid #96f226;
        z-index:2000;
        color:#ffffff;

    }

    .contenido {
        margin-top: 200px;
    }


    @media only screen and (min-width: 1201px) {
        .encabezado
        {
            position: fixed;
            left: 0; /* Posicionamos la cabecera al lado izquierdo */
            top: 0;
            width: 100%;
            height: 50px;
            text-align:center;
            background-color: #00ab84;
            min-height: 80px;
            color:#ffffff;
            padding-bottom: 50px;
            z-index: 50;
        }
        .contenido {
            margin-top: 15px;
        }

    }


</style>
</head>
<body>
<header>
    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="encabezado">
                    <div>
                        <div class="col-lg-2">
                            <img src="{{ asset("/images/baner_UT-230_blanco.png") }}">
                        </div>
                        <div class="col-lg-10">
                            <h1><span>Universidad Tecnológica de Chetumal</span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

</header>

<!-- Main content -->
<section class="content container-fluid" >
    <div class="contenido">
        @yield('content')
    </div>
</section>
<!-- /.content -->

<footer>
    <div class="footer">
        <span class="icon-phone">(983)129 17 65</span>
        <span class="icon-mail">vinculacion@utchetumal.edu.mx</span>
                        <a href="https://www.facebook.com/UTChetumal/" class="icon">
                            <span class="icon-facebook-circled" style="color: #fff">Facebook</span>
                        </a>
                        <a href="https://twitter.com/utchetumal?lang=es" class="icon">
                            <span class="icon-twitter" style="color: #fff">Twitter</span>
                        </a>
        <span class="icon-location">Carretera Chetumal – Bacalar , KM 5.3, Chetumal, Quintana Roo</span>

    </div>
</footer>

<script src="{{ asset("adminlte/jquery/dist/jquery.min.js") }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset("adminlte/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("adminlte/plugins/iCheck/icheck.min.js") }}"></script>
<script>
    $(document).ready(function(){
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
