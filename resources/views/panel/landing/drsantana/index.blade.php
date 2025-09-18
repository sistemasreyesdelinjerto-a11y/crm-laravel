@extends('panel.layouts.panel')

@section('title', 'Panel Dr. Santana')


@section('content')


        <!-- Incluir los modales -->
        @include('panel.landing.drsantana.blog')
        @include('panel.landing.drsantana.trayectoria')
        @include('panel.landing.drsantana.galeriaIndex')
    </section>

@endsection
