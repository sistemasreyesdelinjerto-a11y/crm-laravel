@extends('panel.layouts.panel')

@section('title', 'Panel Dr. Santana')




@section('content')
    @include('panel.landing.drsantana.trayectoria')
    @include('panel.landing.drsantana.galeria')
    @include('panel.landing.drsantana.blog')
@endsection
