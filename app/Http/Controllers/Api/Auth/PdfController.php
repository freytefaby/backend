<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Categoria;
use PDF;

class PdfController extends Controller
{

    public function ventas(Request $request, $id)
        {
            
        
            $show=DB::table('venta as v')
            ->join('clientes as c','v.idcliente','c.idcliente')
            ->join('users as u','u.id','v.idusuario')
            ->join('tipoventa as t','t.idtipoventa','v.idtipoventa')
            ->where('v.idventa',$id)
            ->orderby('v.idventa','desc')
            ->first();
            $detail=DB::table('detalleventa as d')
                    ->join('producto as p','p.idproducto','d.idproducto')
                    ->join('iva as i','i.idiva','p.idiva')
                    ->where('d.idventa',$id)
                    ->get();
            $cabecera=DB::table('infoempresa')->where('idinfoempresa','1')->first();

            if($show)
                {
                    $data = ['cabecera'=>$cabecera,'show'=>$show,'detail'=>$detail];
                    $pdf = PDF::loadView('peticion.pdf.factura', $data);
                    return $pdf->stream('Receipt');

                   // return view('peticion.pdf.factura',compact('detail','show'));
                }
            else
                {
                    return response()->json(["error"=>1],400);
                }



        }



    }


