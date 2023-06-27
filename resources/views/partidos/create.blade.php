@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro de Partidos') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('partidos.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="id_campeonato" class="col-md-4 col-form-label text-md-right">{{ __('Campeonato') }}</label>

                            <div class="col-md-6">
                                <select id="id_campeonato" class="form-control @error('id_campeonato') is-invalid @enderror" name="id_campeonato" required>
                                    <option value="">Seleccione un campeonato</option>
                                    @foreach($campeonatos as $campeonato)
                                        <option value="{{ $campeonato->id }}">{{ $campeonato->nombre }}</option>
                                    @endforeach
                                </select>

                                @error('id_campeonato')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_equipo_local" class="col-md-4 col-form-label text-md-right">{{ __('Equipo Local') }}</label>

                            <div class="col-md-6">
                                <select id="id_equipo_local" class="form-control @error('id_equipo_local') is-invalid @enderror" name="id_equipo_local" required>
                                    <option value="">Seleccione un equipo local</option>
                                    <!-- Aquí puedes iterar sobre los equipos del campeonato seleccionado -->
                                    @foreach($equipos as $equipo)
                                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                                    @endforeach
                                </select>

                                @error('id_equipo_local')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_equipo_visitante" class="col-md-4 col-form-label text-md-right">{{ __('Equipo Visitante') }}</label>

                            <div class="col-md-6">
                                <select id="id_equipo_visitante" class="form-control @error('id_equipo_visitante') is-invalid @enderror" name="id_equipo_visitante" required>
                                    <option value="">Seleccione un equipo visitante</option>
                                    <!-- Aquí puedes iterar sobre los equipos del campeonato seleccionado -->
                                    @foreach($equipos as $equipo)
                                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                                    @endforeach
                                </select>

                                @error('id_equipo_visitante')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="goles_local" class="col-md-4 col-form-label text-md-right">{{ __('Goles Local') }}</label>

                            <div class="col-md-6">
                                <input id="goles_local" type="number" class="form-control @error('goles_local') is-invalid @enderror" name="goles_local" value="{{ old('goles_local') }}" required>

                                @error('goles_local')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="goles_visitante" class="col-md-4 col-form-label text-md-right">{{ __('Goles Visitante') }}</label>

                            <div class="col-md-6">
                                <input id="goles_visitante" type="text" class="form-control @error('goles_visitante') is-invalid @enderror" name="goles_visitante" value="{{ old('goles_visitante') }}" required>

                                @error('goles_visitante')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha') }}" required>

                                @error('fecha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar Partido') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
