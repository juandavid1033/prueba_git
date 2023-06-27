@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Enfrentamiento') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('enfrentamientos.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="equipo_local_id">{{ __('Equipo Local') }}</label>
                            <select id="equipo_local_id" name="equipo_local_id" class="form-control">
                                @foreach($equipos as $equipo)
                                    <option value="{{ $equipo->id }}">{{ $equipo->nombre_equipo }}</option>
                                @endforeach
                            </select>

                            @error('equipo_local_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="equipo_visitante_id">{{ __('Equipo Visitante') }}</label>
                            <select id="equipo_visitante_id" name="equipo_visitante_id" class="form-control">
                                @foreach($equipos as $equipo)
                                    <option value="{{ $equipo->id }}">{{ $equipo->nombre_equipo }}</option>
                                @endforeach
                            </select>

                            @error('equipo_visitante_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Agrega aquí los campos adicionales del enfrentamiento -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Crear Enfrentamiento') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
