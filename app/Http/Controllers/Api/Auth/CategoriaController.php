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
            $categoria=DB::table('categoria')->paginate(7);
            return response()->json($categoria);

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

}
