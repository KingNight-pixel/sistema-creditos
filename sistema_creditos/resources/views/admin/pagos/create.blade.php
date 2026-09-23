@extends('layouts.admin')

@section('title', 'Registrar Pago')

@section('content')

<div class="page-title">
    <h1>Registrar pago</h1>
    <p>Registrar un nuevo pago de crédito.</p>
</div>

<div class="section">

<form action="{{ route('admin.pagos.store') }}" method="POST">

@csrf

<div class="form-grid">

    <div class="form-group">
        <label>Crédito</label>

        <select name="credito_id" required>
            <option value="">Seleccione un crédito</option>
            @foreach($creditos as $credito)
                <option value="{{ $credito->id }}">#{{ $credito->id }} - {{ $credito->cliente?->nombre_completo }} - Saldo ${{ number_format($credito->saldo, 2) }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Monto pagado</label>
        <input type="number" name="monto" step="0.01" min="0.01" required>
    </div>

    <div class="form-group">
        <label>Fecha del pago</label>
        <input type="date" name="fecha_pago" value="{{ date('Y-m-d') }}" required>
    </div>

    <div class="form-group">
        <label>Forma de pago</label>
        <select name="metodo_pago" required>
            <option value="efectivo">Efectivo</option>
            <option value="transferencia">Transferencia</option>
            <option value="tarjeta">Tarjeta</option>
        </select>
    </div>

    <div class="form-group">
        <label>Referencia</label>
        <input type="text" name="referencia">
    </div>

    <div class="form-group full">
        <label>Observaciones</label>
        <textarea name="observaciones"></textarea>
    </div>

</div>

<br>

<button class="btn btn-success">
    Registrar pago
</button>

<a href="{{ route('admin.pagos') }}"
   class="btn btn-dark">
    Cancelar
</a>

</form>

</div>

@endsection