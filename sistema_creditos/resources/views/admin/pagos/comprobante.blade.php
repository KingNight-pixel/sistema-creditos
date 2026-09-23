@extends('layouts.admin')

@section('title', 'Comprobante de Pago')

@section('content')

<div class="page-title">
    <h1>Comprobante de pago</h1>
</div>

<div class="section">

    <h2>Sistema de Créditos</h2>

    <br>

    <p><strong>Comprobante:</strong> #PAG-001</p>
    <p><strong>Cliente:</strong> María López</p>
    <p><strong>Crédito:</strong> #CR-001</p>
    <p><strong>Cuota:</strong> 1</p>
    <p><strong>Monto:</strong> $150.00</p>
    <p><strong>Fecha:</strong> 20/09/2026</p>
    <p><strong>Forma de pago:</strong> Efectivo</p>

    <br>

    <button onclick="window.print()"
            class="btn btn-primary">
        Imprimir comprobante
    </button>

    <a href="{{ route('admin.pagos') }}"
       class="btn btn-dark">
        Regresar
    </a>

</div>

@endsection