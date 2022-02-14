<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Productos;
use App\Models\Transaccion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ReporteController extends Controller
{
    /**
    * Visualiza los productos
    * Transacciones y Stock
    */
    public function index()
    {
        $productos = Productos::all();
        $transacciones = DB::table('transaccions')->join('productos', 'transaccions.producto_id', '=', 'productos.id')
        ->join('usuarios', 'transaccions.comprador_id', '=', 'usuarios.id')
        ->get(['usuarios.nombre as comprador','productos.*']);
    return view('transacciones.reporte', ['productos' => $productos, 'transacciones' => $transacciones]);
    }
}
