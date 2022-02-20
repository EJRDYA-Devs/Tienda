<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TRANSACCION extends Model
{
    
    protected $table= "TRANSACCIONES";
    protected $fillable =['cantidad','id_producto','id_comprador'];
      use HasFactory;
}
