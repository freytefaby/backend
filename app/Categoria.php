<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;


class Categoria extends Authenticatable
{
    use Notifiable, HasApiTokens;
    protected $table='categoria';
    protected $primaryKey='idcategoria';
    public $timestamps=false;
    protected $fillable=[
        'descripcioncategoria'.
        'estado'
    ];
    protected $guarded=[

    ];

}
