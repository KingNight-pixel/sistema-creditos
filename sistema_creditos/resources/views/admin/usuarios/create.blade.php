@extends('layouts.admin')

@section('title', 'Crear Administrador')

@section('content')

<div class="page-title">
    <h1>Crear administrador</h1>
</div>

<div class="section">

<form action="{{ route('admin.usuarios.store') }}" method="POST">

@csrf

<div class="form-grid">

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="name" required>
    </div>

    <div class="form-group">
        <label>Correo</label>
        <input type="email" name="email" required>
    </div>

    <div class="form-group">
        <label>Contraseña</label>
        <input type="password" name="password" required>
    </div>

    <div class="form-group">
        <label>Rol</label>

        <select name="rol" required>
            <option value="admin">Administrador</option>
            <option value="cliente">Cliente</option>
        </select>
    </div>

</div>

<br>

<button class="btn btn-success">
    Crear administrador
</button>

<a href="{{ route('admin.usuarios') }}"
   class="btn btn-dark">
    Cancelar
</a>

<input type="password" name="password_confirmation" required>

</form>

</div>

@endsection