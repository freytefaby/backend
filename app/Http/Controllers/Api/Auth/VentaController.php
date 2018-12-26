<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Venta;

class VentaController extends Controller
{

    public function index(Request $request)
        {
			$buscar=$request->nombre;
            $criterio=$request->criterio;
			if($buscar=='')
       {
          $ventas=DB::table('venta as v')
          ->join('clientes as c','v.idcliente','c.idcliente')
          ->join('users as u','u.id','v.idusuario')
          ->join('tipoventa as t','t.idtipoventa','v.idtipoventa')
          ->where('idusuario',Auth::id())
          ->orderby('idventa','desc')
          ->paginate(7);
       }
       else
       {
        $ventas = Venta::where($criterio,'like','%'.$buscar.'%')->orderBy('idcategoria','desc')->paginate(7);
       }
            
            return response()->json($ventas);

        }

    public function consultacedula(Request $request, $id)
    {
            $consulta=DB::table('clientes')->where('cedulacliente',$id)->first();
            if($consulta)
            return response()->json($consulta,200);
            else
            {
                return response()->json("No se encontro datos",400);
            }


    }
    public function tipoventa(Request $request)
    {
            $consulta=DB::table('tipoventa')->get();
            return response()->json($consulta);
            }


    public function getproductocod(Request $request,$id)
            {
            $consulta=DB::table('producto as p')
            ->join('proveedor as pr','pr.idproveedor','p.idproveedor')
            ->where('codigobarra1',$id)->first();
            if($consulta)
            {
                return response()->json($consulta);
            }
            else
               {
                return response()->json('1',400);

               } 
             
            }            

    

    }


