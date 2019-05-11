<?php

namespace App\Http\Controllers;

use App\Artista;
use App\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtistaController extends Controller
{
    public function create()
    {
        $listaGeneros = Genero::all();
        return view('artista.create',compact('listaGeneros'));
    }

    public function indexFilter($id)
    {
        $listaArtistas = DB::table('artistas')->where('genero_id', $id)->get();
        $listaArtistas = json_decode($listaArtistas, true);
        return view('artista.home', compact('listaArtistas'));
//        return "llegó el id ".$id;
    }

    public function index()
    {
        $listaArtistas = DB::table('artistas')
            ->orderBy('nombre', 'asc')
            ->get();
        $listaArtistas = json_decode($listaArtistas, true);
        return view('artista.home',compact('listaArtistas'));
    }


    public function store(Request $request)
    {
        $objArtista = new Artista();
        $objArtista->nombre = $request->get('nombres');
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            //Move Uploaded File
            $destinationPath = 'images';
            $file->move($destinationPath,$file->getClientOriginalName());
            $objArtista->foto = $destinationPath.'/'.$file->getClientOriginalName();
        }
        $objArtista->genero_id = $request->get('genero');
        $objArtista->save();
        $listaArtistas = Artista::all();
        return view('artista.home',compact('listaArtistas'));
    }

    public function edit($id)
    {
        $objArtista = Artista::find($id);
        $listaGenero = Genero::all();
        $data = [
            'artista'  => $objArtista,
            'generos'   => $listaGenero
        ];
        return view('artista.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $objArtista = Artista::find($id);
        $objArtista->nombre = $request->get('nombres');
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            //Move Uploaded File
            $destinationPath = 'images';
            $file->move($destinationPath,$file->getClientOriginalName());
            $objArtista->foto = $destinationPath.'/'.$file->getClientOriginalName();
        }
        $objArtista->genero_id = $request->get('genero');
        $objArtista->save();
        $listaArtistas = Artista::all();
        $listaArtistas = DB::table('artistas')
            ->orderBy('nombre', 'asc')
            ->get();
        $listaArtistas = json_decode($listaArtistas, true);
        return view('artista.home',compact('listaArtistas'));

//        return "Llego el id para update" . $id;
    }
    public function destroy($id){
        $objArtista = Artista::find($id);
        $objArtista->delete();
        $listaArtistas = Artista::all();
        $listaArtistas = DB::table('artistas')
            ->orderBy('nombre', 'asc')
            ->get();
        $listaArtistas = json_decode($listaArtistas, true);
        return view('artista.home',compact('listaArtistas'));
    }
}
