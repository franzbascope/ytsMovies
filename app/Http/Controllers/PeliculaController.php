<?php

namespace App\Http\Controllers;

use App\Calidade;
use App\Pelicula;
use App\Pelicula_calidade;
use App\Similare;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PhpParser\filesInDir;

class PeliculaController extends Controller
{
    public function create()
    {
        $listaArtistas = Artista::all();
        return view('cancione.create',compact('listaArtistas'));
    }


    function filter(Request $request)
    {
        if($request->pelicula)
        {
            $data = DB::table('peliculas')
                ->where('nombre', 'LIKE', "%{$request->pelicula}%")
                ->get();
            $listaPeliculas = json_decode($data, true);
            return view('pelicula.home',compact('listaPeliculas'));

        }
    }
    public function detalle($id)
    {
        $objPelicula = Pelicula::find($id);
        $listaCalidad = $user = DB::table('calidades')
            ->select('calidad')
            ->join('calidade_pelicula', 'calidades.id', '=', 'calidade_pelicula.calidade_id')
            ->where('calidade_pelicula.pelicula_id', $id)->get();

        $listaPeliculas = $user = DB::table('peliculas')
            ->select('imagen')
            ->join('similares', 'peliculas.id', '=', 'similares.pelicula_id')
            ->where('similares.pelicula2_id', $id)->get();

        $data = [
            'pelicula'  => $objPelicula,
            'listaCalidad'   => $listaCalidad,
            'listaPeliculas'=> $listaPeliculas,
        ];
        return view('pelicula.detalle',compact('data'));
    }

    public function browse()
    {
        $listaPeliculas = Pelicula::all();
        return view('pelicula.home',compact('listaPeliculas'));
    }



    public function index()
    {
        $listaPeliculas = Pelicula::all();
        $listaCalidades = Calidade::all();
        $data = [
            'peliculas'  => $listaPeliculas,
            'calidades'   => $listaCalidades
        ];
        return view('pelicula.homeBackEnd',compact('data'));
    }


    public function ajaxImageUploadPost(Request $request)
    {
        if($request->id==0)
        {
            $objPelicula = new Pelicula();

        }
        else
        {
            $objPelicula = Pelicula::find($request->id);


        }
        if(isset($request->image))
        {
            $input = $request->all();
            $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $input['image']);
            $objPelicula->imagen =  $input['image'];
        }else
            {
                if($request->id==0)
                {
                    $objPelicula->imagen =  "";
                }

            }
        if(isset($request->video))
        {
            $input['video'] = time().'.'.$request->video->getClientOriginalExtension();
            $request->video->move(public_path('images'), $input['video']);
            $objPelicula->video =  $input['video'];
        }
        else{
            if($request->id==0)
            {
                $objPelicula->video =  "";
            }

        }


            $objPelicula->nombre =  $request->nombre;
            $objPelicula->director =  $request->director;
            $objPelicula->generos =  $request->genero;
            $objPelicula->ctomatoes =  $request->calificacionR;
            $objPelicula->cIMDB =  $request->calificacionI;
            $objPelicula->sinapsis =  $request->sinopsis;


            $objPelicula->año =  $request->ano;

            $objPelicula->save();
            if($request->id==0)
            {
                $objPelicula->nuevo=1;
            }else
                {
                    $objPelicula->nuevo=0;
                }
            $lastId =$objPelicula->id;
            DB::table('similares')->where('pelicula2_id', '=', $lastId)->delete();
            DB::table('calidade_pelicula')->where('pelicula_id', '=', $lastId)->delete();
            foreach ($request->similares as $valor) {
                $similar = new Similare();
                $similar->pelicula_id=$valor;
                $similar->pelicula2_id=$lastId;
                $similar->save();
            }
        $calidade = Calidade::find($request->calidades);
        $objPelicula->calidades()->attach($calidade);

            return json_encode($objPelicula);
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
        $id =$request->get('id');
        $objPelicula = Pelicula::find($id);
        $listaCalidad = $user = DB::table('calidade_pelicula')
            ->select('calidade_id')
            ->where('pelicula_id', $id)->get();

        $listaPeliculas = $user = DB::table('similares')
            ->select('pelicula_id')
            ->where('pelicula2_id', $id)->get();

        $data = [
            'pelicula'  => $objPelicula,
            'listaCalidad'   => $listaCalidad,
            'listaPeliculas'=> $listaPeliculas,
        ];


        return json_encode($data);
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
        try {
            $objPelicula = Pelicula::find($id);
            $objPelicula->delete();
            return json_encode(true);
        } catch (Exception $e) {
            return  json_encode(false);
        }
    }
}
