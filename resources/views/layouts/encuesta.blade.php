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
    <link rel="stylesheet" href="/adminlte/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/fontello.css"
    @stack('styles')

<style>
    .encabezado
    {
        width:100%;
        text-align:center;
        background-color: #00ab84;
        min-height: 80px;
        color:#ffffff;
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
</style>
</head>
<body>
<header>
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
</header>
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
</body>
</html>
