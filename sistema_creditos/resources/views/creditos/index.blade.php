@extends('layouts.admin')

@section('title', 'Créditos')

@section('content')

<div class="page-title">
    <h1>Créditos</h1>
    <p>Consulta general de todos los créditos.</p>
</div>

<div class="section">

<a href="{{ route('admin.creditos.create') }}"
   class="btn btn-primary">
    + Crear crédito
</a>

<a href="{{ route('admin.creditos.activos') }}"
   class="btn btn-success">
    Activos
</a>

<a href="{{ route('admin.creditos.vencidos') }}"
   class="btn btn-danger">
    Vencidos
</a>

<a href="{{ route('admin.creditos.pagados') }}"
   class="btn btn-dark">
    Pagados
</a>

<br><br>

<table>

<tr>
    <th>ID</th>
    <th>Cliente</th>
    <th>Monto</th>
    <th>Saldo</th>
    <th>Cuotas</th>
    <th>Estado</th>
    <th>Acción</th>
</tr>

<tr>
    <td>#CR-001</td>
    <td>María López</td>
    <td>$1,500</td>
    <td>$900</td>
    <td>6 / 12</td>

    <td>
        <span class="status activo">
            Activo
        </span>
    </td>

    <td>
        <a href="{{ route('admin.creditos.show', 1) }}"
           class="btn btn-dark">
            Ver detalle
        </a>
    </td>
</tr>

<tr>
    <td>#CR-002</td>
    <td>José Martínez</td>
    <td>$2,000</td>
    <td>$2,000</td>
    <td>0 / 12</td>

    <td>
        <span class="status vencido">
            Vencido
        </span>
    </td>

    <td>
        <a href="{{ route('admin.creditos.show', 2) }}"
           class="btn btn-dark">
            Ver detalle
        </a>
    </td>
</tr>

</table>

</div>

@endsection