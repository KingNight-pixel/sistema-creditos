@extends('layouts.admin')

@section('title', 'Clientes')

@section('content')

<div class="page-title">
    <h1>Clientes</h1>
    <p>Administración de clientes registrados.</p>
</div>

<div class="section">

    <a href="{{ route('admin.clientes.create') }}"
       class="btn btn-primary">
        + Crear cliente
    </a>

    <br><br>

    <table>

        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>DUI</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>

        @foreach($clientes as $cliente)
        <tr>
            <td>{{ $cliente->id }}</td>
            <td>{{ $cliente->nombre_completo }}</td>
            <td>{{ $cliente->documento_identidad }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>{{ $cliente->correo }}</td>
            <td><span class="status {{ $cliente->estado }}">{{ ucfirst($cliente->estado) }}</span></td>
            <td>
                <a href="{{ route('admin.clientes.show', $cliente) }}" class="btn btn-dark">Consultar</a>
                <a href="{{ route('admin.clientes.edit', $cliente) }}" class="btn btn-primary">Editar</a>
            </td>
        </tr>
        @endforeach

    </table>

</div>

@endsection