<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function validarventa($array,$subtotal)
  {
        $vent=0;
        $data=array();
    foreach($array as $ep=>$det)
    {
        
        $consulta=DB::table('producto')->where('idproducto',$det['id'])->first();
        $oper=$consulta->preciosugerido*$det['cantidad']/$consulta->cantidadempaque;
        $vent=$vent+$oper;
        if($det['subtotal']!=$oper || $det['cantidad'] > $consulta->stock)
        {
            array_push($data,["producto"=>$consulta->descripcionproducto,"stock"=>$consulta->stock]);
        }
      
    }
    return $data;
  }
}
