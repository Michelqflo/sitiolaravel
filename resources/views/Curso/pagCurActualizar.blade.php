@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Página de Actualizar </h1>
@endsection

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-success ">
            {{ session('msj') }}
           
        </div>
    @endif

    <form action="{{ route('Curso.xCurUpdate', $xActMateria->id)}}" method="post" class="d-grid gap-2">
        @method('PUT')
        @csrf

        @error('denCur')
            <div class="alert alert-danger">
                La denominacion es requerido
            </div>
        @enderror

        @error('hrsCur')
            <div class="alert alert-danger">
                Las horas del curso es requerido 
            </div>
        @enderror

        @error('creCur')
            <div class="alert alert-danger">
                Los creditos del curso es requerido
            </div>
        @enderror

        @error('plaCur')
            <div class="alert alert-danger">
                El plan de estudios es requerido 
            </div>
        @enderror

        @error('tipCur')
            <div class="alert alert-danger">
                El tipo de curso es requerido
            </div>
        @enderror

        @error('estCur')
            <div class="alert alert-danger">
                El estado del curso es requerido 
            </div>
        @enderror

        <input type="text" name="denCur" placeholder="Denominacion" value="{{ $xActMateria->denCur }}" class="form-control mb-1">
        <input type="text" name="hrsCur" placeholder="Horas del curso" value="{{ $xActMateria->hrsCur }}" class="form-control mb-1">
        <input type="text" name="creCur" placeholder="Creditos del curso" value="{{ $xActMateria->creCur }}" class="form-control mb-1">
        <input type="text" name="plaCur" placeholder="Plan de estudio" value="{{ $xActMateria->plaCur }}" class="form-control mb-1">
        <select name="tipCur" class="form-control mb-1">
            <option value="">Seleccione Tipo de Curso...</option>
            <option value="Transversal" >Curso Transversal</option>
            <option value="Especialidad" >Curso de Especialidad</option>
        </select>
        
        <select name="estCur" class="form-control mb-1">
            <option value="">Seleccione Estado de Curso...</option>
            <option value="Inactivo" >Curso Inactivo</option>
            <option value="Activo" >Curso Activo</option>
        </select>
        <button class="btn btn-success" type="submit">Actualizar</button>
    </form>

          
   
@endsection
