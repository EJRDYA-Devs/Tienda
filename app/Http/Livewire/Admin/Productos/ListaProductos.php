<?php

namespace App\Http\Livewire\Admin\Productos;

use App\Traits\SortBy;
use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Admin\ProductoExport;

class ListaProductos extends Component
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
     * Renderizar el componete con las listas de transacciones realizadas
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        $productos = Producto::with(['categorias'])
            ->withCount((['categorias', 'transacciones']))
            ->where(function ($query) {
                $query->where('productos.nombre', 'like', '%' . $this->search . '%')
                    ->orWhere('productos.descripcion', 'like', '%' . $this->search . '%')
                    ->orWhere('productos.cantidad', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.admin.productos.lista-productos', compact('productos'));
    }
    /**
     * Generar reporte de Excel de las productos registrados..
     *
     * @return \Maatwebsite\Excel\Facades\Excel
     */
    public function generarExcel()
    {
        $productos = Producto::with(['categorias'])
            ->withCount((['categorias', 'transacciones']))
            ->where(function ($query) {
                $query->where('productos.nombre', 'like', '%' . $this->search . '%')
                    ->orWhere('productos.descripcion', 'like', '%' . $this->search . '%')
                    ->orWhere('productos.cantidad', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->get();
        return Excel::download(new ProductoExport($productos), 'productos-' . now() . '.xlsx');
    }
}
