@extends('layouts.admin')

@section('title', 'Dashboard Administrativo')

@section('content')
<div class="page-title">
    <h1>Dashboard</h1>
    <p>Resumen general del sistema de créditos.</p>
</div>

<div class="cards">

    <div class="card">
        <h3>Total de clientes</h3>
        <div class="number">125</div>
    </div>

    <div class="card">
        <h3>Créditos activos</h3>
        <div class="number">48</div>
    </div>

    <div class="card">
        <h3>Créditos pendientes</h3>
        <div class="number">12</div>
    </div>

    <div class="card">
        <h3>Créditos aprobados</h3>
        <div class="number">35</div>
    </div>

    <div class="card">
        <h3>Créditos vencidos</h3>
        <div class="number">7</div>
    </div>

    <div class="card">
        <h3>Pagos recibidos</h3>
        <div class="number">$8,450</div>
    </div>

</div>

<div class="section">

    <h2>Acciones rápidas</h2>

    <br>

    <a href="{{ route('admin.clientes.create') }}"
       class="btn btn-primary">
        Crear cliente
    </a>

    <a href="{{ route('admin.creditos.create') }}"
       class="btn btn-primary">
        Crear crédito
    </a>

    <a href="{{ route('admin.solicitudes') }}"
       class="btn btn-warning">
        Revisar solicitudes
    </a>

    <a href="{{ route('admin.pagos.create') }}"
       class="btn btn-success">
        Registrar pago
    </a>

</div>

<div class="section">

    <h2>Últimos créditos</h2>

    <br>

    <table>

        <tr>
            <th>Cliente</th>
            <th>Monto</th>
            <th>Saldo</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>

        <tr>
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

        <tr>
            <td>José Martínez</td>
            <td>$2,000</td>
            <td>$2,000</td>
            <td>
                <span class="status pendiente">Pendiente</span>
            </td>
            <td>
                <a href="{{ route('admin.creditos.show', 2) }}"
                   class="btn btn-dark">
                    Consultar
                </a>
            </td>
        </tr>

    </table>

</div>

@endsection