@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro de Campeonatos') }}</div>

                <div class="card-body">
                    <form action="{{ route('campeonatos.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">{{ __('Nombre del campeonato') }}</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="fecha" class="form-label">{{ __('Fecha del campeonato') }}</label>
                            <input type="date" class="form-control @error('fecha') is-invalid @enderror" id="fecha" name="fecha" required>
                            @error('fecha')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="equipos" class="form-label">{{ __('Equipos participantes (selecciona al menos 5)') }}</label>
                            <select multiple class="form-control @error('equipos') is-invalid @enderror" id="equipos" name="equipos[]" required>
                                @foreach ($equipos as $equipo)
                                    <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                                @endforeach
                            </select>
                            @error('equipos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Registrar') }}</button>
                    </form>

                    <h1>comando basico de git 2 parte</h1>
                    
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
