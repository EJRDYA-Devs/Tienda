<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaccion;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    /**
     * Mostrar listado de transacciones
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.transacciones.index');
    }
}
