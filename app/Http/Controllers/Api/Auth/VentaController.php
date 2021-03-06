<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Venta;
use App\DetalleVenta;
use App\Cliente;
use Carbon\Carbon;

class VentaController extends Controller
{

    public function index(Request $request)
        {
            $data=$this->PermisoVenta("1","leer");

            if($data)
            {
                return response()->json(["error"=>1],400);
            }
            else
                {
                    $buscar=$request->nombre;
                    $criterio=$request->criterio;
			if($buscar=='')
                {
                    $ventas=DB::table('venta as v')
                    ->join('clientes as c','v.idcliente','c.idcliente')
                    ->join('users as u','u.id','v.idusuario')
                    ->join('tipoventa as t','t.idtipoventa','v.idtipoventa')
                    ->where('v.idusuario',Auth::id())
                    ->orderby('v.idventa','desc')
                    ->paginate(7);
                }
            else
                        {
                            $ventas=DB::table('venta as v') 
                                    ->join('clientes as c','v.idcliente','c.idcliente')
                                    ->join('users as u','u.id','v.idusuario')
                                    ->join('tipoventa as t','t.idtipoventa','v.idtipoventa')
                                    ->where('v.idusuario',Auth::id())
                                    ->where($criterio,'like','%'.$buscar.'%')
                                    ->orderby('v.idventa','desc')->paginate(7);
                        }
            
                   return response()->json($ventas);
                }
			

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
        $data=$this->PermisoVenta("1","crear");
            if($data)
                {
                    return response()->json(["error"=>1],400);
                }
            else
                {
                    $consulta=DB::table('tipoventa')->get();
                    return response()->json($consulta);
                }
           
      }


    public function getproductocod(Request $request,$id)
        {
            $consulta=DB::table('producto as p')
            ->join('proveedor as pr','pr.idproveedor','p.idproveedor')
            ->join('iva as i','i.idiva','p.idiva')
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
    public function create(Request $request)
        {
            $data=$this->PermisoVenta("1","crear");
               if($data)
                    {
                        return response()->json(["error"=>1],400);
                    }
                else
                    {
                        $validator=\Validator::make($request->all(),[
                            'data.*.cantidad'=>'required',
                            'data.*.venta'=>'required',
                            'data.*.utilidad'=>'required',
                            'data.*.id'=>'required',
                            'total' => 'required',
                            'subtotal' => 'required',
                            'comisiones' => 'required',
                            'utilidades' => 'required',
                            'importe' => 'required',
                            'tipo'=>'required'
                                  ]);
                
                        if($validator->fails())
                        {
                          return response()->json( $errors=$validator->errors()->all(),400 );
                        }
                        else
                        {
                            $detalles=$request->data;
                            $data=$this->validarventa($detalles,$request->subtotal);
                
                                if(sizeof($data)>0)
                                {
                                    return response()->json(["error"=>"Los productos no fueron calculados correctamente por favor vuelva a iniciar la venta","producto"=>$data],409);
        
                                }
                                else
                                {
                                         try{
                                DB::beginTransaction();
                                $venta=new Venta();
                                $venta->valorventa=$request->total;
                                $venta->idusuario=Auth::user()->id;
                                $venta->idcliente=$request->cliente;
                                $venta->subtotal=$request->subtotal;
                                $venta->comisionventa=$request->comisiones;
                                $venta->utilidades=$request->utilidades;
                                $mytime=Carbon::now('America/Bogota');
                                $venta->fecha=$mytime->toDateTimeString();
                                $venta->importeventa=$request->importe;
                                $venta->estado='1';
                                $venta->idtipoventa=$request->tipo;
                                $venta->descuento=$request->descuento;
                                $venta->comision='0';
                                $venta->devolucion='0';
                                $venta->comision_devolucion='0';
                                $venta->utilidades_devolucion='0';
                                $venta->convenio='0';
                                $venta->save();
                    
                               
                    
                                foreach($detalles as $ep=>$det)
                                {
                    
                    
                                    $detalle = new DetalleVenta();
                                    $detalle->valor=$det['venta'];
                                    $detalle->idproducto=$det['id'];
                                    $detalle->cantidad=$det['cantidad'];
                                    $detalle->subtotal=$det['subtotal'];
                                    $detalle->idventa=$venta->idventa;
                                    $detalle->utilidad=$det['utilidad'];
                                    $detalle->comision=$det['comision'];
                                    $detalle->save();
                    
                                   
                                }
                            
                    
                                DB::commit();
                                return response()->json(["respuesta"=>"ok","factura"=>$venta->idventa]);
                            } catch(Exception $e)
                            {
                                DB::rollBack();
                                return response()->json($e,400);
                            }
        
                               }
        
                        
                           
                        }
        

                    }
              
                
        }  
            
    public function getclient(Request $request)

       {
        $criterio=$request->criterio;
        $buscar=$request->buscar;

        $cliente=DB::table('clientes as c')->where($criterio,'like','%'.$buscar.'%')->take(10)->get();

                       return response()->json(["data"=>$cliente,200]);

       }

    public function postclient(Request $request)
      {

                $data=$this->PermisoVenta("5","crear");
                if($data)
                    {
                       return response()->json(["error"=>1],400);
                    }
                else
                    {
                        $validator=\Validator::make($request->all(),[
                            'nombre' => 'required',
                            'apellido' => 'required',
                            'telefono' => 'required',
                            'cedula'=>'required|unique:clientes,cedulacliente',
                        
                                ]);
        
                        if($validator->fails())
                        {
                        return response()->json( $errors=$validator->errors()->all(),400 );
                        }
                        else
                        {
                            $cliente = new Cliente();
                            $cliente->nombrecliente=$request->nombre;
                            $cliente->apellidocliente=$request->apellido;
                            $cliente->direccioncliente=$request->direccion;
                            $cliente->telefonocliente=$request->telefono;
                            $cliente->cedulacliente=$request->cedula;
                            $cliente->correocliente=$request->correo;
                            $cliente->save();
        
                            return response()->json(["respuesta"=>"ok","idcliente"=>$request->cedula]);
                        }
                    }
                
        
      }

    public function getproducto(Request $request)
      {
            $criterio=$request->criterio;
            $buscar=$request->buscar;
                
            if($criterio=='')
            {
                return response()->json(["error"=>"error de calculo"],400);
            }
            else
            {
            
            
            $producto=DB::table('producto as p')
            ->join('proveedor as pr','pr.idproveedor','p.idproveedor')
            ->join('categoria as c','c.idcategoria','p.idcategoria')
            ->where($criterio,'like','%'.$buscar.'%')
            ->take(10)->get();
            return response()->json(["data"=>$producto,200]);
            }

       

       


      }

    public function show(Request $request, $id)
        {
            $data=$this->PermisoVenta("1","leer");

            if($data)
            {
                return response()->json(["error"=>1],400);
            }
            else
            {
 
                $show=DB::table('venta as v')
                ->join('clientes as c','v.idcliente','c.idcliente')
                ->join('users as u','u.id','v.idusuario')
                ->join('tipoventa as t','t.idtipoventa','v.idtipoventa')
                ->where('v.idusuario',Auth::id())
                ->where('v.idventa',$id)
                ->orderby('v.idventa','desc')
                ->first();
                $detail=DB::table('detalleventa as d')
                        ->join('producto as p','p.idproducto','d.idproducto')
                        ->join('iva as i','i.idiva','p.idiva')
                        ->where('d.idventa',$id)
                        ->get();
    
                if($show)
                    {
                        return response()->json(["datos"=>$show,"detalle"=>$detail],200);
                    }
                else
                    {
                        return response()->json(["error"=>1],400);
                    }
            }
           

        }

    }


