@extends('layouts.cliente')

@section('title', 'Detalle del crédito')

@section('content')
<div class="cliente-titulo">
    <h1>Detalle del crédito #{{ $credito->id }}</h1>
    <p>Información de tu crédito.</p>
</div>
<div class="cliente-panel">
    <p><strong>Monto:</strong> ${{ number_format($credito->monto, 2) }}</p>
    <p><strong>Interés:</strong> {{ number_format($credito->interes, 2) }}%</p>
    <p><strong>Plazo:</strong> {{ $credito->plazo }} meses</p>
    <p><strong>Cuota:</strong> ${{ number_format($credito->cuota, 2) }}</p>
    <p><strong>Saldo:</strong> ${{ number_format($credito->saldo, 2) }}</p>
    <p><strong>Estado:</strong> {{ ucfirst($credito->estado) }}</p>
    <p><strong>Fecha de inicio:</strong> {{ optional($credito->fecha_inicio)->format('d/m/Y') }}</p>
    <p><strong>Fecha de vencimiento:</strong> {{ optional($credito->fecha_fin)->format('d/m/Y') }}</p>
    <br>
    <a href="{{ route('cliente.creditos') }}" class="btn-cliente btn-oscuro">Regresar</a>
</div>
@endsection
