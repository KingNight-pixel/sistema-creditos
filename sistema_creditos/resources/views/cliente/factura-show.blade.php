@extends('layouts.cliente')

@section('title', 'Comprobante de pago')

@section('content')

<div class="cliente-titulo">

    <h1>Comprobante de pago</h1>

    <p>
        Detalle del pago realizado.
    </p>

</div>


<div class="cliente-panel">

    <h2>Comprobante #00001</h2>

    <div class="info-grid">

        <div class="info-item">

            <strong>Cliente</strong>

            <span>
                Juan Pérez
            </span>

        </div>


        <div class="info-item">

            <strong>Crédito</strong>

            <span>
                CR-00025
            </span>

        </div>


        <div class="info-item">

            <strong>Número de cuota</strong>

            <span>
                01
            </span>

        </div>


        <div class="info-item">

            <strong>Fecha de pago</strong>

            <span>
                30/01/2026
            </span>

        </div>


        <div class="info-item">

            <strong>Monto pagado</strong>

            <span>
                $150.00
            </span>

        </div>


        <div class="info-item">

            <strong>Estado</strong>

            <span>
                <span class="estado estado-pagado">
                    Pagado
                </span>
            </span>

        </div>

    </div>


    <br>

    <a
        href="{{ route('cliente.facturas') }}"
        class="btn-cliente btn-oscuro">

        Regresar a facturas

    </a>

</div>

@endsection