<?php

namespace App\Exports\Admin;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ProductoExport implements FromView
{
    use Exportable;
    protected $productos;
    public function __construct($productos)
    {
        $this->productos = $productos;
    }
    /**
     * Plantilla donde se va a listar las productoss
     *
     * @return View
     */
    public function view(): View
    {
        return view('reportes.admin.productos', [
            'productos' => $this->productos
        ]);
    }
}
