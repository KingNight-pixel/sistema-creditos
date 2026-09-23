@extends('layouts.admin')

@section('title', 'Usuarios')

@section('content')

<div class="page-title">
    <h1>Usuarios y administradores</h1>
    <p>Administración de usuarios del sistema.</p>
</div>

<div class="section">

<a href="{{ route('admin.usuarios.create') }}"
   class="btn btn-primary">
    + Crear administrador
</a>

<br><br>

<table>

<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Correo</th>
    <th>Rol</th>
    <th>Estado</th>
    <th>Acciones</th>
</tr>

<tr>
    <td>1</td>
    <td>Administrador principal</td>
    <td>admin@gmail.com</td>
    <td>Administrador</td>

    <td>
        <span class="status activo">
            Activo
        </span>
    </td>

    <td>
        <a href="{{ route('admin.usuarios.edit', 1) }}"
           class="btn btn-primary">
            Editar permisos
        </a>
    </td>
</tr>

</table>

</div>

@endsection