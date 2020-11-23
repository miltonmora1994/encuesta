@component('mail::message')
# Reporte de Empleados que no registraron en el aplicativo:


@php

$url= url('faltanReportar/export');
@endphp


@component('mail::button', ['url' => $url, 'color' => 'error'])
Excel Empleados sin reportar
@endcomponent

Gracias,<br>
Sistemas
@endcomponent
