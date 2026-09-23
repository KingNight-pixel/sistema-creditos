@extends('layouts.admin')

@section('title', 'Pagos')

@section('content')

<div class="page-title">
    <h1>Pagos</h1>
    <p>Control y registro de pagos.</p>
</div>

<div class="section">

    <a href="{{ route('admin.pagos.create') }}"
       class="btn btn-success">
        + Registrar pago
    </a>

    <br><br>

    <table>

        <tr>
            <th>Pago</th>
            <th>Cliente</th>
            <th>Crédito</th>
            <th>Cuota</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Comprobante</th>
        </tr>

        <tr>
            <td>#PAG-001</td>
            <td>María López</td>
            <td>#CR-001</td>
            <td>1</td>
            <td>$150</td>
            <td>20/09/2026</td>

            <td>
                <a href="{{ route('admin.pagos.comprobante', 1) }}"
                   class="btn btn-dark">
                    Ver comprobante
                </a>
            </td>
        </tr>

    </table>

</div>

@endsection