<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Categoria;

class CategoriaController extends Controller
{

    public function index(Request $request)
        {
			$buscar=$request->nombre;
            $criterio=$request->criterio;
			if($buscar=='')
       {
        $categorias = Categoria::orderBy('idcategoria','desc')->paginate(7);
       }
       else
       {
        $categorias = Categoria::where($criterio,'like','%'.$buscar.'%')->orderBy('idcategoria','desc')->paginate(7);
       }
            
            return response()->json($categorias);

        }

    public function edit(Request $request, $id)
    {
            $categoria_show=DB::table('categoria')->where('idcategoria',$id)->first();
            return response()->json($categoria_show);

    }

    public function update(Request $request,$id)
    {
        $validator=\Validator::make($request->all(),[
            'nombre' => 'required|min:5',
            'descripcion' => 'required|min:5',
                  ]);

        if($validator->fails())
        {
          return response()->json( $errors=$validator->errors()->all(),400 );
        }
        else
        {
            $categoria=Categoria::findOrFail($id);
            $categoria->descripcioncategoria=$request->nombre;
            $categoria->descrip=$request->descripcion;
            $categoria->save();

          return response()->json('success',200);



        }


    }

    public function create(Request $request)
    {
        $validator=\Validator::make($request->all(),[
            'nombre' => 'required|min:5',
            'descripcion' => 'required|min:5',
                  ]);

        if($validator->fails())
        {
          return response()->json( $errors=$validator->errors()->all(),400 );
        }
        else
        {
            $categoria=new Categoria;
            $categoria->descripcioncategoria=$request->nombre;
            $categoria->descrip=$request->descripcion;
            $categoria->estado='1';
            $categoria->save();

          return response()->json('success',200);



        }


    }
	
	public function disabled(Request $request,$id)
    {
      
            $categoria=Categoria::findOrFail($id);
            $categoria->estado='0';
            $categoria->save();

          return response()->json('success',200);



        }
		
		public function enabled(Request $request,$id)
    {
      
            $categoria=Categoria::findOrFail($id);
            $categoria->estado='1';
            $categoria->save();

          return response()->json('success',200);



        }


    }


