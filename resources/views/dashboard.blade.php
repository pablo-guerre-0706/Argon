@extends('layouts.panel')
@section('title', 'Dashboard')

@section('content')

    @if(session('error'))
        <script>
            alert("Acceso Denegado: No tienes autorización para ingresar a este módulo.");
           
            window.location.href = "{{ route('dashboard') }}";
        </script>
    @endif
@endsection
