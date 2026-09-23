@extends('layouts.admin')

@section('title', 'Editar Permisos')

@section('content')

<div class="page-title">
    <h1>Editar permisos</h1>
</div>

<div class="section">

<form action="{{ route('admin.usuarios.update', $usuario) }}" method="POST">
@method('PUT')

@csrf

<div class="form-grid">

    <div class="form-group">
        <label>Usuario</label>
        <input type="text"
               value="{{ $usuario->name }}"
               readonly>
    </div>

    <div class="form-group">
        <label>Rol</label>

        <select name="rol">
            <option value="admin" @selected($usuario->rol === 'admin')>Administrador</option>
            <option value="cliente" @selected($usuario->rol === 'cliente')>Cliente</option>
        </select>
    </div>

    <div class="form-group">
        <label>Estado</label>

        <select>
            <option>Activo</option>
            <option>Inactivo</option>
        </select>
    </div>

</div>

<br>

<button class="btn btn-success">
    Guardar permisos
</button>

<a href="{{ route('admin.usuarios') }}"
   class="btn btn-dark">
    Regresar
</a>

</form>

</div>

@endsection