<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Curso;

class PagesController extends Controller
{
    // PORTADA BIENVENIDA
    public function fnIndex() {
        return view('welcome');
    }

    //LISTA
    public function fnLista() {
        $xAlumnos = Estudiante::paginate(4);  //Datos de BD
        //$xAlumnos = Estudiante::all();
        return view('pagLista', compact('xAlumnos'));
    }

    //CURSO
    public function fnListaCurso() {
        $xMaterias = Curso::paginate(4);  //Datos de BD
        //$xMaterias = Curso::all();
        return view('pagLisCurso', compact('xMaterias'));
    }

    //DETALLE DE CURSO
    public function fnCurDetalle($id) {
        $xDetMaterias = Curso::findOrFail($id);  //Datos de BD por Id
        return view('Curso.pagCurDetalle', compact('xDetMaterias'));
    }
    
    //REGISTRAR CURSO
    public function fnCurRegistrar(Request $request){

        //return $request->all();         //Prueba de "token" y datos recibidos

        $request ->validate([
            'denCur' => 'required',
            'hrsCur' => 'required',
            'creCur' => 'required',
            'plaCur' => 'required',
            'tipCur' => 'required',
            'estCur' => 'required'
            
        ]);

        $nuevoCurso = new Curso;
        $nuevoCurso->denCur = $request->denCur;
        $nuevoCurso->hrsCur = $request->hrsCur;
        $nuevoCurso->creCur = $request->creCur;
        $nuevoCurso->plaCur = $request->plaCur;
        $nuevoCurso->tipCur = $request->tipCur;
        $nuevoCurso->estCur = $request->estCur;
       
        $nuevoCurso->save();
        
        //$xAlumnos = Estudiante1::all();                      //Datos de BD
        //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
        return back()->with('msj','Se registro con éxito...'); //Regresar con msj
    }

    //ACTUALIZAR CURSO
    public function fnCurActualizar($id){                   //Paso 1

        $xActMateria = Curso::findOrFail($id);
        return view('Curso.pagCurActualizar', compact('xActMateria'));
    } 

    //UPDATE CURSO
    public function fnCurUpdate(Request $request, $id){                   //Paso 1

        $xUpdateMateria = Curso::findOrFail($id);

        $xUpdateMateria -> denCur = $request -> denCur;
        $xUpdateMateria -> hrsCur = $request -> hrsCur;
        $xUpdateMateria -> creCur = $request -> creCur;
        $xUpdateMateria -> plaCur = $request -> plaCur;
        $xUpdateMateria -> tipCur = $request -> tipCur;
        $xUpdateMateria -> estCur = $request -> estCur;

        $xUpdateMateria -> save();          //Guardado en BD
        
        return back()->with('msj','Se actualizo con exito...');
    }
    
    //ELIMINAR CURSO
    public function fnCurEliminar($id) {
        $deleteMateria = Curso::findOrFail($id);  //Datos de BD
        $deleteMateria->delete();
        return back()->with('msj', 'Se elimino con exito...');
    }
   
   /*
    //DETALLE LISTA
    public function fnEstDetalle($id) {
        $xDetAlumnos = Estudiante::findOrFail($id);  //Datos de BD por Id
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    //ELIMINAR LISTA
    public function fnEliminar($id) {
        $deleteAlumno = Estudiante::findOrFail($id);  //Datos de BD
        $deleteAlumno->delete();
        return back()->with('msj', 'Se elimino con exito...');
    }

    //ACTUALIZAR LISTA
    public function fnEstActualizar($id){                   //Paso 1

        $xActAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    //UPDATE LISTA
    public function fnUpdate(Request $request, $id){                   //Paso 1

        $xUpdateAlumnos = Estudiante::findOrFail($id);

        $xUpdateAlumnos -> codEst = $request -> codEst;
        $xUpdateAlumnos -> nomEst = $request -> nomEst;
        $xUpdateAlumnos -> apeEst = $request -> apeEst;
        $xUpdateAlumnos -> fnaEst = $request -> fnaEst;
        $xUpdateAlumnos -> turMat = $request -> turMat;
        $xUpdateAlumnos -> semMat = $request -> semMat;
        $xUpdateAlumnos -> estMat = $request -> estMat;

        $xUpdateAlumnos -> save();          //Guardado en BD
        
        return back()->with('msj','Se actualizo con exito...');
    }


    // PARA REGISTRAR
    public function fnRegistrar(Request $request){

        //return $request->all();         //Prueba de "token" y datos recibidos

        $request ->validate([
            'codEst' => 'required',
            'nomEst' => 'required',
            'apeEst' => 'required',
            'fnaEst' => 'required',
            'turMat' => 'required',
            'semMat' => 'required',
            'estMat' => 'required'
        ]);

        $nuevoEstudiante = new Estudiante;
        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->fnaEst = $request->fnaEst;
        $nuevoEstudiante->turMat = $request->turMat;
        $nuevoEstudiante->semMat = $request->semMat;
        $nuevoEstudiante->estMat = $request->estMat;
        
        $nuevoEstudiante->save();
        
        //$xAlumnos = Estudiante1::all();                      //Datos de BD
        //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
        return back()->with('msj','Se registro con éxito...'); //Regresar con msj
    }
    */
    /*
    public function fnGaleria ($numero=0) {
        return "foto codigo: ".$numero;
        return view('pagGaleria', ['valor'=> $numero, 'otro'=>25]) ;
         }
       */ 
}
