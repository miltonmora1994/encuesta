@component('mail::message')
# Un cordial saludo
Reportes en excel.


@php

$encuestas = url('/encuestas/export');
$sinsintomas = url('/sinsintomas/export');
$consintomas = url('/consintomas/export');
$covid = url('/concovid/export');
$reportes= url('/home');

@endphp

@component('mail::button', ['url' => $reportes, 'color' => 'success'])
Reportes en Excel
@endcomponent

{{-- @component('mail::button', ['url' => $sinsintomas, 'color' => 'success'])
Excel de Encuestas Sin Sintomas
@endcomponent



@component('mail::button', ['url' => $consintomas, 'color' => 'error'])
Excel de Encuestas Con Sintomas
@endcomponent

@component('mail::button', ['url' => $covid, 'color' => 'error'])
Excel de Encuestas Con Covid19
@endcomponent --}}

	

Gracias,<br>
Sistemas
@endcomponent
