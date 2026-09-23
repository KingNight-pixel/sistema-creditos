@extends('layouts.admin')

@section('title', 'Créditos Activos')

@section('content')

<div class="page-title">
    <h1>Créditos activos</h1>
    <p>Créditos actualmente vigentes.</p>
</div>

<div class="section">

<table>

<tr>
    <th>Crédito</th>
    <th>Cliente</th>
    <th>Monto</th>
    <th>Saldo</th>
    <th>Estado</th>
    <th>Acción</th>
</tr>

<tr>
    <td>#CR-001</td>
    <td>María López</td>
    <td>$1,500</td>
    <td>$900</td>
    <td>
        <span class="status activo">Activo</span>
    </td>
    <td>
        <a href="{{ route('admin.creditos.show', 1) }}"
           class="btn btn-dark">
            Consultar
        </a>
    </td>
</tr>

</table>

</div>

@endsection