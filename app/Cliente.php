<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;


class Cliente extends Authenticatable
{
    use Notifiable, HasApiTokens;
    protected $table='clientes';
    protected $primaryKey='idcliente';
    public $timestamps=false;
    protected $fillable=[
        'nombrecliente',
		'apellidocliente',
        'direccioncliente',
        'telefonocliente',
        'cedulacliente',
        'correocliente'
    ];
    protected $guarded=[

    ];

}
