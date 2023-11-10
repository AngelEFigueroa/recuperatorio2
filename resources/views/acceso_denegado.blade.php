@extends('adminlte::page')

@section('title', 'Dashboard')

 
@section('content_header')
    <h1>Programando con Laravel :D</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title"></h1>
        </div>

        <div class="card-body">
            <p>El Club Atlético Boca Juniors es una entidad deportiva argentina, con sede en el barrio de La Boca, Buenos
                Aires. Fue fundado el 3 de abril de 1905 por seis vecinos adolescentes hijos de italianos. El fútbol
                masculino es su disciplina más destacada, aunque también compite a nivel profesional, nacional e
                internacionalmente, en baloncesto, voleibol, futsal, fútbol femenino y balonmano mientras que deportes como
                el boxeo, judo, karate, taekwondo, gimnasia rítmica, gimnasia artística y hockey se practican a nivel
                amateur. Actualmente se desempeña en la Liga Profesional de Fútbol Argentino.</p>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        Swal.fire(
            'No tienes acceso a este sitio!'
        )
    </script>
@stop
