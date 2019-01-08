<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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

  public function PermisoVenta($recurso,$access)
  {
    $aux=true;
    $user=DB::table('users as u')->where('id',Auth::id())->first();

    $permiso=DB::table('permiso as p')
    ->where('p.idrol','=',$user->idrol)
    ->where('p.idrecurso','=',$recurso)
    ->first();

    if($permiso)
      {
        if($permiso->$access==1)
        {
            $aux=false;
        }
      }
    


      return $aux;
  }
}
