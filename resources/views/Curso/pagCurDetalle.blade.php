@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Página lista </h1>
@endsection

@section('seccion')
    <h3>Detalle Curso </h3>
    
    <p> Codigo:               {{ $xDetMaterias->id }} </p>
    <p> Denominacion:         {{ $xDetMaterias->denCur }} </p>
    <p> Horas de curso:       {{ $xDetMaterias->hrsCur }} </p>
    <p> Creditos del curso:   {{ $xDetMaterias->creCur }} </p>
    <p> Plan de estudios:     {{ $xDetMaterias->plaCur }} </p>
    <p> Tipo:                 {{ $xDetMaterias->tipCur }} </p>
    <p> Estado:               {{ $xDetMaterias->estCur }} </p>
@endsection
 
 
    