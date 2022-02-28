<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $NOMBRE
 * @property $DESCRIPCION
 * @property $CANTIDAD
 * @property $id_categoria
 * @property $ID_VENDEDOR
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Transaccione $transaccione
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'NOMBRE' => 'required',
		'DESCRIPCION' => 'required',
		'CANTIDAD' => 'required',
		'id_categoria' => 'required',
		'ID_VENDEDOR' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['NOMBRE','DESCRIPCION','CANTIDAD','id_categoria','ID_VENDEDOR'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'id_categoria');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function transaccione()
    {
        return $this->hasOne('App\Models\Transaccione', 'ID_PRODUCTO', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'ID_VENDEDOR');
    }
    

}
