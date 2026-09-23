@extends('layouts.admin')

@section('title', 'Crear Crédito')

@section('content')

<div class="page-title">
    <h1>Crear crédito</h1>
    <p>Registrar un nuevo crédito para un cliente.</p>
</div>

<div class="section">

<form action="{{ route('admin.creditos.store') }}" method="POST">

@csrf

<div class="form-grid">

    <div class="form-group">
        <label>Seleccionar cliente</label>

        <select name="cliente" required>
            <option value="">Seleccione un cliente</option>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nombre_completo }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Monto</label>
        <input type="number" step="0.01" name="monto">
    </div>

    <div class="form-group">
        <label>Interés (%)</label>
        <input type="number" step="0.01" name="interes">
    </div>

    <div class="form-group">
        <label>Plazo</label>
        <input type="text" name="plazo" type="number" min="1" placeholder="12">
    </div>

    <div class="form-group">
        <label>Número de cuotas</label>
        <input type="number" name="cuotas" required>
    </div>

    <div class="form-group">
        <label>Fecha de inicio</label>
        <input type="date" name="fecha_inicio">
    </div>

    <div class="form-group">
        <label>Fecha de vencimiento</label>
        <input type="date" name="fecha_vencimiento">
    </div>

    <div class="form-group">
        <label>Forma de pago</label>

        <select name="forma_pago">
            <option>Mensual</option>
            <option>Quincenal</option>
            <option>Semanal</option>
        </select>
    </div>

</div>

<br>

<button class="btn btn-success">
    Crear crédito
</button>

<a href="{{ route('admin.creditos') }}"
   class="btn btn-dark">
    Cancelar
</a>

</form>

</div>

@endsection