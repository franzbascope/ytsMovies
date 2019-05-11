<?php

namespace App\Http\Controllers;

use App\Calidade;
use http\Exception;
use Illuminate\Http\Request;

class CalidadeController extends Controller
{
    public function create()
    {
        $listaArtistas = Artista::all();
        return view('cancione.create',compact('listaArtistas'));
    }

    public function indexFilter($id)
    {
        $listaCanciones = DB::table('canciones')->where('artista_id', $id)->get();
        $listaCanciones = json_decode($listaCanciones, true);
        return view('cancione.home', compact('listaCanciones'));
    }

    public function index()
    {
        $listaCalidades = Calidade::all();
        return view('calidade.home',compact('listaCalidades'));
    }


    public function store(Request $request)
    {

        $objCalidade = new Calidade();
        $objCalidade->calidad = $request->get('calidad');
        $objCalidade->save();
        return json_encode($objCalidade);
    }

    public function buscar(Request $request)
    {
        $listaCanciones = DB::table('canciones')->join('artistas', 'canciones.artista_id', '=', 'artistas.id')
            ->where('titulo', 'like','%'.$request->get('buscar').'%')
            ->orWhere('artistas.nombre','like','%'.$request->get('buscar').'%')
            ->get();
        $listaCanciones = json_decode($listaCanciones, true);
        return view('cancione.home', compact('listaCanciones'));
    }

    public function edit(Request $request)
    {
        $objCalidade = Calidade::find($request->get('id'));
        return json_encode($objCalidade);
    }

    public function update(Request $request)
    {
        $objCalidade = Calidade::find($request->get('id'));
        $objCalidade->calidad = $request->get('calidad');
        $objCalidade->save();
        return json_encode($objCalidade);
    }
    public function destroy($id){
        try {
            $objCalidade = Calidade::find($id);
            $objCalidade->delete();
            return json_encode(true);
        } catch (Exception $e) {
            return  json_encode(false);
        }

    }
}
