<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    
    public function index()
    {
        //la pagina de inicio que se va a cargar o mostrar
//        $datos = "Facultad autodidacta";
  //      return view('welcome', compact('datos'));
        $datos = Personas::orderBy('fecha_nacimiento','desc')->paginate(3);
        return view('inicio',compact('datos'));
    }

    public function create()
    {
        //el formulario donde nosotros agregamos datos
        return view('agregar');
    }

    public function store(Request $request)
    {
        //Sirve para almacenar datos en la bd
        //print_r($_POST); este metodo nos permite saber lo que nos esta retornando por post
        $personas = new Personas();
        $personas->paterno = $request->post('paterno');
        $personas->materno = $request->post('materno');
        $personas->nombre = $request->post('nombre');
        $personas->fecha_nacimiento = $request->post('fecha_nacimiento');
        $personas->save();

        return redirect()->route('personas.index')->with('success','Agregado con exito');
    }

    public function show($id)
    {
        //sirve para obtener un registro de nuestra tabla
        $personas = Personas::find($id);
        return view('eliminar',compact('personas'));
    }

    public function edit($id)
    {
        //este metodo nos sirve para traer los datos que se van a editar
        //y los coloca en un foemulario
        $personas = Personas::find($id);
        return view('actualizar',compact('personas'));
        //echo $id;
    }

    public function update(Request $request, $id)
    {
        //este metodo actualiza los datos en la bd
        $personas = Personas::find($id);
        $personas->paterno = $request->post('paterno');
        $personas->materno = $request->post('materno');
        $personas->nombre = $request->post('nombre');
        $personas->fecha_nacimiento = $request->post('fecha_nacimiento');
        $personas->save();

        return redirect()->route('personas.index')->with('success','Actualizado con éxito');
    }

    public function destroy($id)
    {
        //elimina un registro
        //print_r($id);
        $personas = Personas::find($id);
        $personas->delete();
        return redirect()->route('personas.index')->with('success','Eliminado con éxito');
    }
}
