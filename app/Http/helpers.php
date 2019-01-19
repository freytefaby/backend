<?php
if(!function_exists("saludo"))
{
    function saludo()
    {
        return "hola desde mi helpers creado por mí";
    }
}

/**
    * formatea fecha
    * */
    if(!function_exists("fecha"))
    {
        function fecha($fecha){
          $dia=substr($fecha,8,2);
          $mes=substr($fecha,5,2);
          $anio=substr($fecha,0,4);
        switch ($mes){
          case '01':
          $mes="Ene";
          break;
          case '02':
          $mes="Feb";
          break;
          case '03':
          $mes="Mar";
          break;
          case '04':
          $mes="Abr";
          break;
          case '05':
          $mes="May";
          break;
          case '06':
          $mes="Jun";
          break;
          case '07':
          $mes="Jul";
          break;
          case '08':
          $mes="Ago";
          break;
          case '09':
          $mes="Sep";
          break;
          case '10':
          $mes="Oct";
          break;
          case '11':
          $mes="Nov";
          break;
          case '12':
          $mes="Dic";
          break;
        }
        $fecha=$dia." de ".$mes." de ".$anio;
        return $fecha; 
        }
    }


    if(!function_exists("fecha_credito"))
    {

        
        function fecha_credito($fecha,$dias){
         
        
			$fecha1 = strtotime ( '+'.$dias.' day' , strtotime ( $fecha ) ) ;
			$reset = date ( 'Y-m-d h:m:s' , $fecha1 );
        return $reset; 
        }
    }
	
	function ValidarUrl($url) {
 //fsockopen -> Abrir una conexión de sockets de dominio de Internet o Unix
 //resource fsockopen ( string destino, int puerto [, int errno [, string errstr [, float tiempo_espera]]])
 $validar = @fsockopen($url, 80, $errno, $errstr, 15);
 if ($validar) {
  fclose($validar);
  return true;
 }else
  return false;
}

function limpiarjson($json) {
       $json=str_replace('"\ufeff','',$json);
	   $json=str_replace('[{\"','[{"',$json);
	   $json=str_replace('\"}]"','"}]',$json);
	   $json=str_replace('\":\"','":"',$json);
	   $json=str_replace(' \",\"','","',$json);
	   $json=str_replace('\",\"','","',$json); 
       $json=str_replace('\"}','"}',$json);
       $json=str_replace('{\"','{"',$json);	 
       $json=str_replace('\":','":',$json);	 
       $json=str_replace(',\"',',"',$json);		   
	   $json=str_replace('HTTP/1.0 200 OK','',$json);
	   $json=str_replace('Cache-Control: no-cache','',$json);
	   $json=str_replace('Content-Type:','',$json);
	   $json=str_replace('application/json','',$json);
	   
	   return $json;
}


