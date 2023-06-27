@extends('layouts.app')

@section('content')
<style>
    a {
        text-decoration: none;
    }

    h1 {
        font-weight: 700;
    }

    h2 {
        font-weight: 700;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">{{ __('Bienvenido') }}, {{ Auth::user()->name }}</h1>

            <div class="row mt-4">
                @foreach($enfrentamientos as $enfrentamiento)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ $enfrentamiento->equipo_local->logo }}" alt="Logo Equipo Local">
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <h2>{{ $enfrentamiento->equipo_local->nombre_equipo }}</h2>
                                        <h2>VS</h2>
                                        <h2>{{ $enfrentamiento->equipo_visitante->nombre_equipo }}</h2>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ $enfrentamiento->equipo_visitante->logo }}" alt="Logo Equipo Visitante">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if(count($enfrentamientos) === 0)
                    <div class="col-md-12">
                        <p>No hay enfrentamientos disponibles.</p>
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('enfrentamientos.create') }}" class="btn btn-primary">Añadir nuevo enfrentamiento</a>
                </div>
            </div>
