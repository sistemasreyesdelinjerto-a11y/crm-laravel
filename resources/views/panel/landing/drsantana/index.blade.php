@extends('panel.layouts.panel')

@section('title', 'Panel Dr. Santana')




@section('content')
    @yield('panel.landing.drsantana.trayectoria')
    @yield('panel.landing.drsantana.galeria')
    @include('panel.landing.drsantana.blog')
@endsection
