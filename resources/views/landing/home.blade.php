@extends('landing.layouts.landing')

@section('title', 'Inicio')

@section('content')
    <!-- Menú -->
    @include('landing.menu.header')

    <!-- Hero -->
    @include('landing.sections.hero')
        @include('landing.sections.conocenos')
        
      @include('landing.sections.calculadora') <!-- Nueva sección -->


    <!-- Servicios -->

    @include('landing.sections.servicios')

    <!-- Blog -->
    @include('landing.blog.listado')

    <!-- Formulario de contacto -->
    @include('landing.forms.contacto')
      @include('landing.sections.footer')
@endsection
