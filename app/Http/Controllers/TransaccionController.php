<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Productos;
use App\Models\Transaccion;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Redirect;

class TransaccionController extends Controller
{
    /**
     * Visualiza los Usuarios,
     * Visualiza los Productos
     */
    public function index()
    {
        $clientes = Usuarios::all();
        $productos = Productos::all();
        return view('transacciones.index', ['clientes' => $clientes, 'productos' => $productos]);
    }

    /**
     * Realiza el insert de una nueva compra y actualiza el stock del producto,
     */
    public function store(Request $request)
    {
        $request->validate(['cantidad' => 'required']);
        $request->validate(['cliente_id' => 'required']);
        $request->validate(['producto_id' => 'required']);

        $transaccion = new Transaccion;

        $transaccion->cantidad = $request->cantidad;

        $producto = Productos::find($request->producto_id);
        if ($producto->cantidad < $request->cantidad) {
            return Redirect::back()->withErrors(['msg' => 'Cantidad ingresada no disponible en el stock del producto']);
        }

        $producto->cantidad = $producto->cantidad - $request->cantidad;
        $producto->save();


        $transaccion->producto_id = $request->producto_id;
        $transaccion->comprador_id = $request->cliente_id;
        $transaccion->estado = true;

        $transaccion->save();



        return redirect()->route('transacciones')->with('success', 'Datos guardados con exito');
    }
}
