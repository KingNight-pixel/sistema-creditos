@extends('layouts.admin')

@section('title', 'Reportes')

@section('content')

<div class="page-title">
    <h1>Reportes</h1>
    <p>Información general del sistema.</p>
</div>

<div class="cards">

    <div class="card">
        <h3>Créditos activos</h3>
        <div class="number">48</div>

        <br>

        <a href="{{ route('admin.creditos.activos') }}"
           class="btn btn-primary">
            Ver
        </a>
    </div>

    <div class="card">
        <h3>Créditos vencidos</h3>
        <div class="number">7</div>

        <br>

        <a href="{{ route('admin.creditos.vencidos') }}"
           class="btn btn-danger">
            Ver
        </a>
    </div>

    <div class="card">
        <h3>Pagos</h3>
        <div class="number">$8,450</div>

        <br>

        <a href="{{ route('admin.pagos') }}"
           class="btn btn-primary">
            Ver
        </a>
    </div>

    <div class="card">
        <h3>Clientes</h3>
        <div class="number">125</div>

        <br>

        <a href="{{ route('admin.clientes') }}"
           class="btn btn-primary">
            Ver
        </a>
    </div>

</div>

<div class="section">

<h2>Reporte por período</h2>

<br>

<form>

    <div class="form-grid">

        <div class="form-group">
            <label>Fecha inicial</label>
            <input type="date">
        </div>

        <div class="form-group">
            <label>Fecha final</label>
            <input type="date">
        </div>

    </div>

    <br>

    <button class="btn btn-primary">
        Generar reporte
    </button>

</form>

</div>

@endsection