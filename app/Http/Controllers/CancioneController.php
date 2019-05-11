<?php

namespace App\Http\Controllers;

use App\Artista;
use App\Cancione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CancioneController extends Controller
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
        $listaCanciones = Cancione::all();
        return view('cancione.home',compact('listaCanciones'));
    }


    public function store(Request $request)
    {
        $objCancione = new Cancione();
        $objCancione->titulo = $request->get('titulo');
        $objCancione->artista_id = $request->get('artista');
        $objCancione->mp3 = $request->get('audio');
        $objCancione->save();
        $listaCanciones = Cancione::all();
        return view('cancione.home',compact('listaCanciones'));
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

    public function edit($id)
    {
        $objCancione = Cancione::find($id);
        $listaArtista = Artista::all();
        $data = [
            'cancione'  => $objCancione,
            'artistas'   => $listaArtista
        ];
        return view('cancione.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $objCancione = Cancione::find($id);
        $objCancione->titulo = $request->get('titulo');
        $objCancione->artista_id = $request->get('artista');
        $objCancione->mp3 = $request->get('mp3');
        $objCancione->save();
        $listaCanciones = Cancione::all();
        return view('cancione.home',compact('listaCanciones'));
    }
    public function destroy($id){
        $objCancione = Cancione::find($id);
        $objCancione->delete();
        $listaCanciones = Cancione::all();
        return view('cancione.home',compact('listaCanciones'));
    }
}
