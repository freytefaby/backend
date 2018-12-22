<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;


class Venta extends Authenticatable
{
    use Notifiable, HasApiTokens;
    protected $table='venta';
    protected $primaryKey='idventa';
    public $timestamps=false;
    protected $fillable=[
        'valorventa',
		'idusuario',
        'idcliente',
        'subtotal',
        'comisionventa',
        'utilidades',
        'fecha',
        'importeventa',
        'estado',
        'idtipoventa',
        'descuento',
        'comision',
        'devolucion',
        'comision_devolucion',
        'utilidades_devolucion',
        'convenio'
    ];
    protected $guarded=[

    ];

}
