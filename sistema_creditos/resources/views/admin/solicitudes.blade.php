@extends('layouts.admin')

@section('title', 'Solicitudes de Crédito')

@section('content')

<div class="page-title">
    <h1>Solicitudes de crédito</h1>
    <p>Revisión y aprobación de solicitudes.</p>
</div>

<div class="section">

<table>

<tr>
    <th>ID</th>
    <th>Cliente</th>
    <th>Monto</th>
    <th>Plazo</th>
    <th>Fecha</th>
    <th>Estado</th>
    <th>Acciones</th>
</tr>

<tr>
    <td>#SOL-001</td>
    <td>María López</td>
    <td>$2,000</td>
    <td>12 meses</td>
    <td>20/09/2026</td>

    <td>
        <span class="status pendiente">
            Pendiente
        </span>
    </td>

    <td>

        <a href="{{ route('admin.solicitudes.show', 1) }}"
           class="btn btn-dark">
            Revisar
        </a>

        <a href="#"
           class="btn btn-success">
            Aprobar
        </a>

        <a href="#"
           class="btn btn-danger">
            Rechazar
        </a>

    </td>
</tr>

</table>

</div>

@endsection