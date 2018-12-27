<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;


class DetalleVenta extends Authenticatable
{
    use Notifiable, HasApiTokens;
    protected $table='detalleventa';
    protected $primaryKey='iddetalleventa';
    public $timestamps=false;
    protected $fillable=[
        'valor',
        'idproducto',
        'cantidad',
        'subtotal',
        'idventa',
        'utilidad',
        'comision'
    ];
    protected $guarded=[

    ];

}
