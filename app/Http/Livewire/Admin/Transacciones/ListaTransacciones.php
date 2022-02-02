<?php

namespace App\Http\Livewire\Admin\Transacciones;

use App\Models\User;
use App\Traits\SortBy;
use Livewire\Component;
use App\Models\Producto;
use App\Models\Transaccion;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Admin\TransaccionExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ListaTransacciones extends Component
{
    use WithPagination, SortBy;
    /**
     * Elegir el tipo de paginación
     *
     * @var string
     */
    protected $paginationTheme = 'bootstrap';
    /**
     * Parametros en la url
     *
     * @var array
     */
    protected $queryString     = [
        'search' => ['except' => ''],
        'page',
    ];
    /**
     * Cantidad de registros por paginas a mostrar.
     *
     * @var integer
     */
    public $perPage  = 10;
    /**
     * Buscar entre los registros de las transacciones
     *
     * @var string
     */
    public $search   = '';
    /**
     * Ordenar los registros segun la columna.
     *
     * @var string
     */
    public $orderBy =  'id';
    /**
     * Ordenar de manera ascendente o descendente
     *
     * @var boolean
     */
    public $orderAsc = true;
    /**
     * Identificador del producto seleccionado
     *
     * @var string
     */
    public $producto_id = '';
    /**
     * Identificador del comprador seleccionado
     *
     * @var string
     */
    public $comprador_id = '';
    /**
     * Cantidad
     *
     * @var string
     */
    public $cantidad = '';
    /**
     * Productos disponibles para seleccionar
     *
     * @var array
     */
    public $productos = [];
    /**
     * Compradores disponibles para seleccionar
     *
     * @var array
     */
    public $compradores = [];

    /**
     * Renderizar el componete con las listas de transacciones realizadas
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        $this->compradores = User::all(['id', 'nombre']);
        $this->productos = Producto::where('cantidad', '>', 0)->get(['id', 'nombre', 'cantidad']);
        $transacciones = Transaccion::join('productos', 'transacciones.id_producto', '=', 'productos.id')
            ->join('usuarios', 'transacciones.id_comprador', '=', 'usuarios.id')
            ->where(function ($query) {
                $query->where('transacciones.cantidad', 'like', '%' . $this->search . '%')
                    ->orWhere('productos.nombre', 'like', '%' . $this->search . '%')
                    ->orWhere('usuarios.nombre', 'like', '%' . $this->search . '%');
            })
            ->select('transacciones.*', 'usuarios.nombre as comprador', 'productos.nombre as producto')
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.admin.transacciones.lista-transacciones', compact('transacciones'));
    }
    /**
     * Reglas de validaciones
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'producto_id' => 'required',
            'comprador_id' => 'required',
            'cantidad' => 'required|numeric',
        ];
    }
    /**
     * Mensajes de validaciones
     *
     * @return array
     */
    protected function messages()
    {
        return [
            'producto_id.required' => 'No has seleccionado el producto',
            'comprador_id.required' => 'No has seleccionado el comprador',
            'cantidad.required' => 'No has agregado la cantidad',
            'cantidad.numeric' => 'La cantidad no puede contener letras',
            'cantidad.max' => 'La cantidad debe ser menor a :max'
        ];
    }
    /**
     * Guardar una transacción y actualizar stock
     *
     * @return void
     */
    public function guardarTransaccion()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $producto = Producto::find($this->producto_id);
            if ($producto->cantidad < $this->cantidad) {
                $this->addError('cantidad', 'La cantidad es superior al stock del producto.');
            }
            $transaccion = Transaccion::create([
                'cantidad' => $this->cantidad,
                'id_producto' => $this->producto_id,
                'id_comprador' => $this->comprador_id
            ]);
            $producto->update([
                'cantidad' => $producto->cantidad - $this->cantidad
            ]);
            DB::commit();
            $this->resetValidation();
            $this->reset(['cantidad', 'producto_id', 'comprador_id']);
            $this->alert(
                'success',
                'Transaccion generada Correctamente'

            );
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug("Error al generar una transaccion", $e->getTrace());
            $this->alert(
                'error',
                'Hubo un error al realizar este proceso, revisa el registro de errores'

            );
        }
    }
    /**
     * Generar reporte de Excel de las transacciones realizadas..
     *
     * @return \Maatwebsite\Excel\Facades\Excel
     */
    public function generarExcel()
    {
        $transacciones = Transaccion::join('productos', 'transacciones.id_producto', '=', 'productos.id')
            ->join('usuarios', 'transacciones.id_comprador', '=', 'usuarios.id')
            ->where(function ($query) {
                $query->where('transacciones.cantidad', 'like', '%' . $this->search . '%')
                    ->orWhere('productos.nombre', 'like', '%' . $this->search . '%')
                    ->orWhere('usuarios.nombre', 'like', '%' . $this->search . '%');
            })
            ->select('transacciones.*', 'usuarios.nombre as comprador', 'productos.nombre as producto')
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->get();
        return Excel::download(new TransaccionExport($transacciones), 'transacciones-' . now() . '.xlsx');
    }
}
