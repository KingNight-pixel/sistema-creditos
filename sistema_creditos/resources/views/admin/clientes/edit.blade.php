@extends('layouts.admin')

@section('title', 'Editar Cliente')

@section('content')

<div class="page-title">
    <h1>Editar cliente</h1>
</div>

<div class="section">

    <form action="{{ route('admin.clientes.update', $cliente) }}" method="POST">
        @method('PUT')

        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label>Nombre completo</label>
                <input type="text" name="nombre" value="{{ $cliente->nombre_completo }}">
            </div>

            <div class="form-group">
                <label>DUI</label>
                <input type="text" name="dui" value="{{ $cliente->documento_identidad }}">
            </div>

            <div class="form-group">
                <label>Teléfono</label>
                <input type="text" name="telefono" value="{{ $cliente->telefono }}">
            </div>

            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="email" value="{{ $cliente->correo }}">
            </div>

            <div class="form-group full">
                <label>Dirección</label>
                <textarea name="direccion">{{ $cliente->direccion }}</textarea>
            </div>

            <div class="form-group">
                <label>Estado</label>

                <select name="estado">
                    <option value="activo" @selected($cliente->estado === 'activo')>Activo</option>
                    <option value="inactivo" @selected($cliente->estado === 'inactivo')>Inactivo</option>
                </select>
            </div>

        </div>

        <br>

        <button class="btn btn-success">
            Guardar cambios
        </button>

        <a href="{{ route('admin.clientes') }}"
           class="btn btn-dark">
            Regresar
        </a>

    </form>

</div>

@endsection