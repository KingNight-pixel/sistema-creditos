@extends('layouts.portal', ['role' => $role])
@php
    $data = [
        'clientes' => ['Clientes', 'Administra las cuentas y datos de tus clientes'],
        'nuevo-cliente' => ['Nuevo cliente', 'Registra un cliente en el sistema'],
        'solicitudes' => ['Solicitudes de crédito', 'Revisa y toma decisiones sobre solicitudes pendientes'],
        'creditos' => [$role === 'admin' ? 'Gestión de créditos' : 'Mis créditos', 'Consulta el estado y detalle de tus créditos'],
        'pagos' => [$role === 'admin' ? 'Pagos y comprobantes' : 'Mis pagos', 'Historial de pagos y comprobantes registrados'],
        'reportes' => ['Cobranza y reportes', 'Indicadores de cartera y control de cobranza'],
        'solicitar' => ['Solicitar crédito', 'Completa la información para enviar tu solicitud'],
        'facturas' => ['Facturas y comprobantes', 'Descarga los comprobantes de tus pagos'],
        'perfil' => ['Mi perfil', 'Mantén actualizada la información de tu cuenta'],
    ];
    [$title, $description] = $data[$page] ?? ['Panel', 'Información del sistema'];
@endphp
@section('title', $title . ' | Crédito')
@section('heading', $title)
@section('subheading', $description)
@section('content')
@if($page === 'solicitar' || $page === 'nuevo-cliente' || $page === 'perfil')
<div class="panel" style="max-width:820px"><div class="panel-header"><h2>{{ $page === 'solicitar' ? 'Datos de la solicitud' : 'Información personal' }}</h2></div><form><div class="form-grid"><div class="field"><label>{{ $page === 'solicitar' ? 'Monto solicitado' : 'Nombre completo' }}</label><input placeholder="{{ $page === 'solicitar' ? 'Ingrese el monto' : auth()->user()->name }}"></div><div class="field"><label>{{ $page === 'solicitar' ? 'Plazo' : 'Correo electrónico' }}</label>@if($page === 'solicitar')<select><option>Seleccione el plazo</option><option>6 meses</option><option>12 meses</option><option>18 meses</option></select>@else<input value="{{ auth()->user()->email }}"></input>@endif</div><div class="field"><label>{{ $page === 'solicitar' ? 'Propósito del crédito' : 'Teléfono' }}</label><input placeholder="Ingrese la información"></div><div class="field"><label>Información adicional</label><input placeholder="Opcional"></div></div><button type="button" class="btn primary">{{ $page === 'solicitar' ? 'Enviar solicitud' : 'Guardar cambios' }}</button></form></div>
@else
<div class="panel"><div class="panel-header"><h2>{{ $title }}</h2><a href="#">Exportar información →</a></div><table><thead><tr><th>Referencia</th><th>Detalle</th><th>Fecha</th><th>Estado</th><th>Acción</th></tr></thead><tbody><tr><td>#CR-001</td><td>Información de ejemplo</td><td>20 Sep, 2026</td><td><span class="status green">Activo</span></td><td><a href="#" style="color:#0875e1;font-weight:700;text-decoration:none">Ver</a></td></tr><tr><td>#CR-002</td><td>Registro pendiente</td><td>18 Sep, 2026</td><td><span class="status yellow">Pendiente</span></td><td><a href="#" style="color:#0875e1;font-weight:700;text-decoration:none">Ver</a></td></tr></tbody></table></div>
@endif
@endsection
