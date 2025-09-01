@extends('panel.layouts.panel')

@section('title', 'Resultados de la Landing')


@section('content')
@include('panel.landing.contenido.informacion')
    @include('panel.landing.contenido.calculadora')

@endsection
