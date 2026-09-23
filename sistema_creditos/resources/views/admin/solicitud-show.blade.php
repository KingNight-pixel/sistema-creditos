@extends('layouts.admin')

@section('title', 'Revisar Solicitud')

@section('content')

<div class="page-title">
    <h1>Revisar solicitud</h1>
    <p>Información presentada por el cliente.</p>
</div>

<div class="section">

    <h2>Datos del solicitante</h2>

    <br>

    <p><strong>Cliente:</strong> María López</p>
    <p><strong>DUI:</strong> 01234567-8</p>
    <p><strong>Teléfono:</strong> 7000-0000</p>
    <p><strong>Ingresos:</strong> $800</p>

</div>

<div class="section">

    <h2>Información del crédito</h2>

    <br>

    <p><strong>Monto solicitado:</strong> $2,000</p>
    <p><strong>Plazo:</strong> 12 meses</p>
    <p><strong>Motivo:</strong> Gastos personales</p>

    <br>

    <a href="#"
       class="btn btn-success">
        Aprobar solicitud
    </a>

    <a href="#"
       class="btn btn-danger">
        Rechazar solicitud
    </a>

    <a href="{{ route('admin.solicitudes') }}"
       class="btn btn-dark">
        Regresar
    </a>

</div>

@endsection