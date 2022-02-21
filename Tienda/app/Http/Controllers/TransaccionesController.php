<?php

namespace App\Http\Controllers;

use App\Models\PRODUCTO;
use App\Models\TRANSACCION;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Symfony\Component\Console\Logger\ConsoleLogger;

class TransaccionesController extends Controller
{
    //Muestra todas las transacciones existentes
    public function ReporteTransacciones()
    {
        $transaccion = TRANSACCION::all();
        $titulo = "Historico de Transacciones";
        return view("ReporteTransacciones", ["transaccion" => $transaccion, "titulo" => $titulo]);
    }

    public function ReporteProductos()
    {
        $producto = PRODUCTO::all();
        $titulo = "Total de productos";
        return view("ReporteProductos", ["producto" => $producto, "titulo" => $titulo]);
    }

    //Funcion que llama a blade para llenar formulario de nueva transaccion
    public function create()
    {
        return view("formTransaccion", ["usuarios" => Usuario::all()], ["productos" => PRODUCTO::all()]);
    }

    //almacena en la tabla transacciones lo ingresado en el formulario formTransaccion.blade
    public function store(Request $request)
    {

        $ProductoSeleccionado = PRODUCTO::where(
            'ID',
            $request->input('id_producto')
        )->First();

        $rangoMaximo = $ProductoSeleccionado->CANTIDAD;
        $request->validate(
            [
                'cantidad' => 'required|integer|between:1,' . $rangoMaximo,
            ]
        );

        $transaccion = new TRANSACCION();
        $NuevaCantidad = ($ProductoSeleccionado->CANTIDAD - $request->input('cantidad'));
        $transaccion->cantidad = $NuevaCantidad;
        $transaccion->id_producto = $request->input('id_producto');
        $transaccion->id_comprador = $request->input('id_comprador');
        

        $this->updateProduct($transaccion);

        $transaccion->save();
        return redirect()->route('Create_transaccion');
        
    }

    //Funcion que actualiza stock de inventario cuando una transaccion es añadida
    public function updateProduct($request)
    {

        $producto = PRODUCTO::findOrFail($request->id_producto);
        $producto->cantidad = $request->cantidad;
        $producto->id_vendedor = $request->id_comprador;
        $producto->save();
    }

    //Llma formulario para escoger transaccion a eliminar
    public function Eliminar()
    {
        $titulo = "Seccion de Eliminar transaccion";
        return view("formDeleteTransaccion", ["transaccion" => TRANSACCION::all(), "titulo" => $titulo]);
    }


    //Funcion que actualiza stock de inventario cuando una transaccion es eliminada
    public function updateD($transaccion)
    {
        $producto = PRODUCTO::findOrFail($transaccion->ID_PRODUCTO);
        $producto->CANTIDAD = $transaccion->CANTIDAD + $producto->CANTIDAD;
        $producto->ID_VENDEDOR = $transaccion->ID_COMPRADOR;
        $producto->save();
        
    }

    //elimina una transaccion con el parametro id de la Transaccion
    public function Destroy($id)
    {
        $transaccion = TRANSACCION::findOrFail($id);

        $this->updateD($transaccion);
        TRANSACCION::Destroy($id);
    }

    //consulta una transaccion en especifico
    public function show($id)
    {
        $transaccion = TRANSACCION::where('id', '=', $id)->get();
        $titulo = "Transaccion Consultada";
        return view("transacciones", ["transaccion" => $transaccion, "titulo" => $titulo]);
    }
}
