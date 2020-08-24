@extends('layouts.master')

@section('title', 'Seguimiento de egresados 2020')

@section('content_header')
@stop
<style>
    .material-switch > input[type="checkbox"] {
        display: none;
    }

    .material-switch > label {
        cursor: pointer;
        height: 0px;
        position: relative;
        width: 40px;
    }

    .material-switch > label::before {
        background: rgb(0, 0, 0);
        box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        content: '';
        height: 16px;
        margin-top: -8px;
        position:absolute;
        opacity: 0.3;
        transition: all 0.4s ease-in-out;
        width: 40px;
    }
    .material-switch > label::after {
        background: rgb(255, 255, 255);
        border-radius: 16px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        content: '';
        height: 24px;
        left: -4px;
        margin-top: -8px;
        position: absolute;
        top: -4px;
        transition: all 0.3s ease-in-out;
        width: 24px;
    }
    .material-switch > input[type="checkbox"]:checked + label::before {
        background: inherit;
        opacity: 0.5;
    }
    .material-switch > input[type="checkbox"]:checked + label::after {
        background: inherit;
        left: 20px;
    }
</style>

@section('content')
    <h1> Bienvenido al sistema de seguimiento a egresados 2020</h1>
    <p class="text-primary">.text-primary</p>
    <p class="text-secondary">.text-secondary</p>
    <p class="text-success">.text-success</p>
    <p class="text-danger">.text-danger</p>
    <p class="text-warning">.text-warning</p>
    <p class="text-info">.text-info</p>
    <p class="text-light bg-dark">.text-light</p>
    <p class="text-dark">.text-dark</p>
    <p class="text-muted">.text-muted</p>
    <p class="text-white bg-dark">.text-white</p>

    <ul class="fc-color-picker" id="color-chooser">
        <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
        <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
        <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
        <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
        <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
        <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
        <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
        <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
        <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
        <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
        <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
        <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
        <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
    </ul>

    <select>
        <option class="text-aqua" style="background-color: #f012be">
            <i class="fa fa-square"></i> Opcion 1
        </option>
        <option class="text-blue" style="background-color: #01ff70">
            <i class="fa fa-square"></i> Opcion 2
        </option>
    </select>
@stop


