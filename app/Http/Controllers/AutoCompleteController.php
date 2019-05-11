<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutoCompleteController extends Controller
{
    function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('peliculas')
                ->where('nombre', 'LIKE', "%{$query}%")
                ->orWhere('generos', 'LIKE', "%{$query}%")
                ->orWhere('año', 'LIKE', "%{$query}%")
                ->orWhere('director', 'LIKE', "%{$query}%")
                ->orWhere('sinapsis', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '
                <li><a href="#">'.$row->nombre.'</a></li>
                 ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
