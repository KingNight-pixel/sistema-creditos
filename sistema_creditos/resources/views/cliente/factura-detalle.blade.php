@extends('layouts.cliente')

@section('title', 'Detalle de factura')

@section('content')
<div class="cliente-titulo">
    <h1>Factura del crédito #{{ $factura->id }}</h1>
    <p>Detalle de la factura asociada al crédito.</p>
</div>
<div class="cliente-panel">
    <p><strong>Cliente:</strong> {{ $cliente->nombre_completo }}</p>
    <p><strong>Monto:</strong> ${{ number_format($factura->monto, 2) }}</p>
    <p><strong>Total:</strong> ${{ number_format($factura->total_credito, 2) }}</p>
    <p><strong>Saldo:</strong> ${{ number_format($factura->saldo, 2) }}</p>
    <p><strong>Estado:</strong> {{ ucfirst($factura->estado) }}</p>
    <br>
    <a href="{{ route('cliente.facturas') }}" class="btn-cliente btn-oscuro">Regresar a facturas</a>
</div>
@endsection
