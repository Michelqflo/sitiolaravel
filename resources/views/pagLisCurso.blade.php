@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Página de Curso </h1>
@endsection

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-success ">
            {{ session('msj') }}
           
        </div>
    @endif

    <form action="{{ route('Curso.xCurRegistrar')}}" method="post" class="d-grid gap-2">
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

        <input type="text" name="denCur" placeholder="Denominacion" value="{{ old('denCur')}}" class="form-control mb-1">
        <input type="text" name="hrsCur" placeholder="Horas del curso" value="{{ old('hrsCur')}}" class="form-control mb-1">
        <input type="text" name="creCur" placeholder="Creditos del curso" value="{{ old('creCur')}}" class="form-control mb-1">
        <input type="text" name="plaCur" placeholder="Plan de estudio" value="{{ old('plaCur')}}" class="form-control mb-1">
        <select name="tipCur" class="form-control mb-1">
            <option value="">Seleccione Tipo de Curso...</option>
            <option value="Transversal">Curso Transversal</option>
            <option value="Especialidad">Curso de Especialidad</option>
        </select>
        
        <select name="estCur" class="form-control mb-1">
            <option value="">Seleccione Estado de Curso...</option>
            <option value="Inactivo">Curso Inactivo</option>
            <option value="Activo">Curso Activo</option>
        </select>
        <button class="btn btn-success" type="submit">Agregar</button>
    </form>


    <h3>Lista </h3>

    
        <table class="table">
            <thead class="table-dark">
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Denominacion</th>
                <th scope="col">Horas</th>
                <th scope="col">Modificar</th>
                </tr>
            </thead>
            
            <tbody>
            @foreach($xMaterias as $item) 
            
                <tr>
                    <th scope="row">{{ $item->id}}</th>
                    <td>{{ $item->denCur}}</td>
                    <td>
                        <a href="{{ route('Curso.xCurDetalle',  $item->id)}}">
                        {{ $item->hrsCur}}
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('Curso.xCurEliminar', $item->id) }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">X</button>
                        </form>
                                          
                        <a class="btn btn-warning btn-sm" href="{{ route('Curso.xCurActualizar',$item->id )}}">
                            A
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
         </table>
            
    {{ $xMaterias->links() }}         
   
@endsection
