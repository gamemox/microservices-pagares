<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagares;

class PagaresController extends Controller
{
  
   
   function getPagaresValidos(Request $request,$rut){
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
        header('Access-Control-Allow-Credentials: true');  
        $db = app('db');
        $results = $db->select("SELECT p.* 
                                FROM pagaresfc p
                                where p.knumerut=".$rut. "
                                    and exists (select 'a' from tipocred t where t.ptipcred=p.ptipcred and sifcuweb_activo='S')
                                    and esvalido=1
                                    order by anhoproc asc, semestre asc");
        return  json_encode($results);
       
   }
   
   function getPagaresAll(Request $request,$rut){
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
        header('Access-Control-Allow-Credentials: true');  
        $db = app('db');
        $results = $db->select("SELECT p.* 
                                FROM pagaresfc p
                                where p.knumerut=".$rut. "
                                    and exists (select 'a' from tipocred t where t.ptipcred=p.ptipcred and sifcuweb_activo='S')
                                    order by anhoproc asc, semestre asc ");
        return  json_encode($results);
       
   }
}
