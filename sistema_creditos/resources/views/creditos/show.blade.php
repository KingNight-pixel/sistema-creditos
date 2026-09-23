@extends('layouts.admin')

@section('title', 'Detalle del Crédito')

@section('content')

<div class="page-title">
    <h1>Detalle del crédito</h1>
</div>

<div class="section">

    <h2>Información general</h2>

    <br>

    <p><strong>Crédito:</strong> #{{ $credito->id }}</p>
    <p><strong>Cliente:</strong> {{ $credito->cliente?->nombre_completo }}</p>
    <p><strong>Monto:</strong> ${{ number_format($credito->monto, 2) }}</p>
    <p><strong>Interés:</strong> {{ number_format($credito->interes, 2) }}%</p>
    <p><strong>Plazo:</strong> {{ $credito->plazo }} meses</p>
    <p><strong>Saldo:</strong> ${{ number_format($credito->saldo, 2) }}</p>

    <br>

    <a href="{{ route('admin.clientes.show', $credito->cliente) }}"
       class="btn btn-primary">
        Ver cliente
    </a>

    <a href="{{ route('admin.pagos.create') }}"
       class="btn btn-success">
        Registrar pago
    </a>

</div>

<div class="section">

<h2>Cuotas</h2>

<br>

<table>

<tr>
    <th>Cuota</th>
    <th>Fecha</th>
    <th>Monto</th>
    <th>Estado</th>
</tr>

<tr>
    <td>1</td>
    <td>20/09/2026</td>
    <td>$150</td>
    <td>
        <span class="status pagado">Pagada</span>
    </td>
</tr>

<tr>
    <td>2</td>
    <td>20/10/2026</td>
    <td>$150</td>
    <td>
        <span class="status pendiente">Pendiente</span>
    </td>
</tr>

</table>

</div>

@endsection