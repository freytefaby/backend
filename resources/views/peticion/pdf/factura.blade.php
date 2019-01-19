<!DOCTYPE html>
<html lang="ar">
<!-- <html lang="ar"> for arabic only -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Coda' rel='stylesheet' type='text/css'>
    <title>Express Wash Customer Invoice</title>
    <style>

        html {
 margin: 0;
}
body {
 margin: 0mm 0mm 0mm 0.5mm;
} 

.container
{
	width:287px;
	//border:solid 1px;
	//border-color:blue;
	position:absolute;
	margin-left:0;
}   
.order
{
   width:90px;
   //border:solid 1px;
   float:right;
   text-align:right;
   font-family: 'Coda', cursive;
    font-size:10px;
}
.user
{
   width:193px;
   //border:solid 1px;
   float:right;
   text-align:left;
   font-family: 'Coda', cursive;
    font-size:10px;
}
.info_empresa
{
	width:287px;
	//border:solid 1px;
	//border-color:red;
	text-align:center;
	font-family: 'Coda', cursive;
    font-size:12px;
	border-bottom-color:#CCD1D1;
	border-bottom-style:dashed; 
	border-bottom-width:2px;
	margin-bottom:10px;
} 
.nombre_empresa
{
font-family: 'Coda', cursive;
font-size:15px;
}
.cliente
{
	width:150px;
	//border:solid 1px;
	float:left;
	text-align:center;
	font-family: 'Coda', cursive;
    font-size:12px;
	border-bottom-color:#CCD1D1;
	border-bottom-style:dashed; 
	border-bottom-width:2px;
	margin-bottom:10px;
}
.fecha
	{
		width:133px;
		float:right;
		//border:solid 1px;
		text-align:center;
		font-family: 'Coda', cursive;
		font-size:12px;
		border-bottom-color:#CCD1D1;
		border-bottom-style:dashed; 
		border-bottom-width:2px;
		margin-bottom:10px;
	}
	
.producto
	{
		width:111px;
		//border:solid 1px;
		//border-color:yellow;
		float:left;
		margin-top:0;
		font-family: 'Coda', cursive;
		font-size:12px;
	}
	
.cantidad
	{
		width:80px;
		//border:solid 1px;
		//border-color:pink;
		float:left;
		margin-top:0;
		text-align:center;
		font-family: 'Coda', cursive;
		font-size:12px;
	}
.precio
	{
		width:90px;
		//border:solid 1px;
		//border-color:pink;
		float:left;
		margin-top:0;
		text-align:right;
		font-family: 'Coda', cursive;
		font-size:12px;
		
	}
	
.producto_th
	{
		width:111px;
		//border:solid 1px;
		//border-color:yellow;
		float:left;
		margin-top:0;
		font-family: 'Coda', cursive;
		font-size:12px;
		border-bottom-color:#CCD1D1;
		border-bottom-style:dashed; 
		border-bottom-width:2px;
		margin-bottom:10px;
	}
	
.cantidad_th
	{
		width:80px;
		//border:solid 1px;
		//border-color:pink;
		float:left;
		margin-top:0;
		text-align:center;
		font-family: 'Coda', cursive;
		font-size:12px;
		border-bottom-color:#CCD1D1;
		border-bottom-style:dashed; 
		border-bottom-width:2px;
		margin-bottom:10px;
	}
.precio_th
	{
		width:90px;
		//border:solid 1px;
		//border-color:pink;
		float:left;
		margin-top:0;
		text-align:right;
		font-family: 'Coda', cursive;
		font-size:12px;
		border-bottom-color:#CCD1D1;
		border-bottom-style:dashed; 
		border-bottom-width:2px;
		margin-bottom:10px;
	}
.parcial
	{
		width:200px;
		//border: solid 1px;
		text-align:right;
		float:right;
		font-family: 'Coda', cursive;
		font-size:12px;
		border-bottom-color:#CCD1D1;
		border-bottom-style:dashed; 
		border-bottom-width:2px;
		
		border-right-color:#CCD1D1;
		border-right-style:dashed; 
		border-right-width:2px;
	
	}
.impuesto
	{
		width:200px;
		//border: solid 1px;
		text-align:right;
		float:right;
		font-family: 'Coda', cursive;
		font-size:12px;
		border-bottom-color:#CCD1D1;
		border-bottom-style:dashed; 
		border-bottom-width:2px;
		
		border-right-color:#CCD1D1;
		border-right-style:dashed; 
		border-right-width:2px;
	
	}
.neto
	{
		width:200px;
		//border: solid 1px;
		text-align:right;
		float:right;
		font-family: 'Coda', cursive;
		font-size:12px;
		border-bottom-color:#CCD1D1;
		border-bottom-style:dashed; 
		border-bottom-width:2px;
		
		border-right-color:#CCD1D1;
		border-right-style:dashed; 
		border-right-width:2px;
	}
.contenedor_productos
	{
		//border: solid 1px;
		border-bottom-color:#CCD1D1;
		border-bottom-style:dashed; 
		border-bottom-width:2px;
	}
.clean
{
clear:both;
margin-bottom:0px;
padding-bottom:0px;
margin-top:0;
}
    </style>
</head>
<body>

	<div class="container">
	    <div class="order">
	       Venta #: {{$show->idventa}}
	    </div>
		 <div class="user">
	       Usuario: {{$show->name}} 
	    </div>
		<P class="clean"></P>
		<div class="info_empresa">
			<p style="margin-top:0px; margin-bottom:0px;">
			   <span class="nombre_empresa"> {{strtolower($cabecera->nombrecomercialempresa)}}</span><br>
				{{strtolower($cabecera->direccionempresa)}}<br>
				{{$cabecera->telefonoempresa}}<br>
				Nit {{$cabecera->nitempresa}} <br>
				{{strtolower($cabecera->ciudadempresa)}}
			</p>
		</div>
		<div class="cliente">
		Nombre cliente: <br>
		{{$show->nombrecliente}}<br><br>
		
		</div>
		<div class="fecha">
		Fecha: <br>
		{{($show->fecha)}}
		
		<br><br>
		</div>
		<p class="clean"></p>
		
		<div class="producto_th">
		<p style="margin-top:0; margin-bottom:4px;">Producto</p>
		</div>
		<div class="cantidad_th">
			<p style="margin-top:0; margin-bottom:4px;">Cantidad</p>
		</div>
		<div class="precio_th">
			<p style="margin-top:0; margin-bottom:4px;">Precio</p>
		</div>
		<p class="clean"></p>
		<div class="contenedor_productos">
		
		@foreach($detail as $det)
		<div class="producto">
		{{strtolower($det->descripcionproducto)}}
		</div>
		<div class="cantidad">
			{{$det->cantidad}}
		</div>
		<div class="precio">
			${{number_format($det->valor)}} COP
		</div>
		
		<p class="clean"></p>
		@endforeach
		</div>
		<div class="parcial">
			<p style="margin-top:10px; margin-bottom:4px; margin-right:5px">Parcial: $20.000 Cop</p>
		</div>
		<p class="clean"></p>
		<div class="impuesto">
			<p style="margin-top:10px; margin-bottom:4px; margin-right:5px">Parcial: $20.000 Cop</p>
		</div>
		<p class="clean"></p>
		<div class="neto">
			<p style="margin-top:10px; margin-bottom:4px; margin-right:5px">Parcial: $20.000 Cop</p>
		</div>
	</div>			
	
		
	

</body>
</html>