<?php

namespace App\Http\Controllers;

use App\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function create()
    {
        return view('genero.create');
    }

    public function store(Request $request)
    {
        $objGenero = new Genero();
        $objGenero->nombre = $request->get('nombres');
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');

            //Display File Name
            echo 'File Name: '.$file->getClientOriginalName();
            echo '<br>';

            //Display File Extension
            echo 'File Extension: '.$file->getClientOriginalExtension();
            echo '<br>';

            //Display File Real Path
            echo 'File Real Path: '.$file->getRealPath();
            echo '<br>';

            //Display File Size
            echo 'File Size: '.$file->getSize();
            echo '<br>';

            //Display File Mime Type
            echo 'File Mime Type: '.$file->getMimeType();

            //Move Uploaded File
            $destinationPath = 'images';
            $file->move($destinationPath,$file->getClientOriginalName());
            $objGenero->imagen = $destinationPath.'/'.$file->getClientOriginalName();
        }
            $objGenero->save();
        return redirect('');
    }

    public function edit($id)
    {
        $objGenero = Genero::find($id);
        return view('genero.edit', compact('objGenero'));
//        return "llegó el id ".$id;
    }

    public function update(Request $request, $id)
    {
        $objGenero = Genero::find($id);
        $objGenero->nombre = $request->get('nombres');
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');

            //Display File Name
            echo 'File Name: '.$file->getClientOriginalName();
            echo '<br>';

            //Display File Extension
            echo 'File Extension: '.$file->getClientOriginalExtension();
            echo '<br>';

            //Display File Real Path
            echo 'File Real Path: '.$file->getRealPath();
            echo '<br>';

            //Display File Size
            echo 'File Size: '.$file->getSize();
            echo '<br>';

            //Display File Mime Type
            echo 'File Mime Type: '.$file->getMimeType();

            //Move Uploaded File
            $destinationPath = 'images';
            $file->move($destinationPath,$file->getClientOriginalName());
            $objGenero->imagen = $destinationPath.'/'.$file->getClientOriginalName();
        }
        $objGenero->save();
        return redirect('');

//        return "Llego el id para update" . $id;
    }
    public function destroy($id){
        $objGenero = Genero::find($id);
        $objGenero->delete();
        return redirect('');
    }
}
