<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaPersonas = Persona::all();
        return view('persona.home',
            compact('listaPersonas'));
    }

    public function create()
    {
        return view('persona.create');
    }

    public function store(Request $request)
    {
        $objPersona = new Persona();
        $objPersona->nombres = $request->get('nombres');
        $objPersona->apellidos = $request->get('apellidos');
        $objPersona->edad = $request->get('edad');
        $objPersona->fechaNacimiento = $request->get('fechaNacimiento');
        $objPersona->save();
        return redirect('persona');
    }

    public function edit($id)
    {
        $objPersona = Persona::find($id);
        return view('persona.edit', compact('objPersona'));
//        return "llegó el id ".$id;
    }

    public function update(Request $request, $id)
    {
        $objPersona = Persona::find($id);
        $objPersona->nombres = $request->get('nombres');
        $objPersona->apellidos = $request->get('apellidos');
        $objPersona->edad = $request->get('edad');
        $objPersona->fechaNacimiento = $request->get('fechaNacimiento');
        $objPersona->save();
        return redirect('persona');

//        return "Llego el id para update" . $id;
    }
    public function destroy($id){
        $objPersona = Persona::find($id);
        $objPersona->delete();
        return redirect('persona');
    }
}
