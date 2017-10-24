<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagares;

class PagaresController extends Controller
{
  function getPagaresValidos(Request $request,$rut){
        $db = app('db');
        $results = $db->select("SELECT p.*,t.* FROM pagaresfc p,  tipocred t
                                where p.knumerut=".$rut. "
                                    and esvalido=1
                                    and p.ptipcred=t.ptipcred 
                                    and sifcuweb_activo='S'");
        
        return response()->json([
            "contador" => count($results),
            "datos" => $results,
        ]);
       
   }
   
   function getPagaresAll(Request $request,$rut){
        $db = app('db');
        $results = $db->select("SELECT p.*,t.* FROM pagaresfc p,  tipocred t
                                where p.knumerut=".$rut. "
                                    and p.ptipcred=t.ptipcred 
                                    and sifcuweb_activo='S'");
        
        return response()->json([
            "contador" => count($results),
            "datos" => $results,
        ]);
       
   }
}
