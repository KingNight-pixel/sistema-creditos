@extends('layouts.admin')

@section('title', 'Crear Cliente')

@section('content')

<div class="page-title">
    <h1>Crear cliente</h1>
    <p>Registrar un nuevo cliente.</p>
</div>

<div class="section">

    <form action="{{ route('admin.clientes.store') }}" method="POST">

        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label>Nombre completo</label>
                <input type="text" name="nombre">
            </div>

            <div class="form-group">
                <label>DUI</label>
                <input type="text" name="dui">
            </div>

            <div class="form-group">
                <label>Teléfono</label>
                <input type="text" name="telefono">
            </div>

            <div class="form-group">
                <label>Correo electrónico</label>
                <input type="email" name="email">
            </div>

            <div class="form-group full">
                <label>Dirección</label>
                <textarea name="direccion"></textarea>
            </div>

        </div>

        <br>

        <button type="submit" class="btn btn-success">
            Guardar cliente
        </button>

        <a href="{{ route('admin.clientes') }}"
           class="btn btn-dark">
            Cancelar
        </a>

    </form>

</div>

@endsection