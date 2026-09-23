@extends('layouts.admin')

@section('title', 'Consultar Cliente')

@section('content')

<div class="page-title">
    <h1>Información del cliente</h1>
    <p>Detalle y créditos asociados.</p>
</div>

<div class="section">

    <h2>Datos personales</h2>

    <br>

    <p><strong>Nombre:</strong> {{ $cliente->nombre_completo }}</p>
    <p><strong>DUI:</strong> {{ $cliente->documento_identidad }}</p>
    <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
    <p><strong>Correo:</strong> {{ $cliente->correo }}</p>
    <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
    <p><strong>Estado:</strong>
        <span class="status {{ $cliente->estado }}">{{ ucfirst($cliente->estado) }}</span>
    </p>

</div>

<div class="section">

    <h2>Créditos del cliente</h2>

    <br>

    <table>

        <tr>
            <th>Crédito</th>
            <th>Monto</th>
            <th>Saldo</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>

        @foreach($cliente->creditos as $credito)
        <tr>
            <td>#{{ $credito->id }}</td>
            <td>${{ number_format($credito->monto, 2) }}</td>
            <td>${{ number_format($credito->saldo, 2) }}</td>
            <td><span class="status {{ $credito->estado }}">{{ ucfirst($credito->estado) }}</span></td>
            <td><a href="{{ route('admin.creditos.show', $credito) }}" class="btn btn-dark">Ver crédito</a></td>
        </tr>
        @endforeach

    </table>

</div>

@endsection