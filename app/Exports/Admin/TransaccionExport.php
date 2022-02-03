<?php

namespace App\Exports\Admin;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class TransaccionExport implements FromView
{
    use Exportable;
    protected $transacciones;
    public function __construct($transacciones)
    {
        $this->transacciones = $transacciones;
    }
    /**
     * Plantilla donde se va a listar las transaccioness
     *
     * @return View
     */
    public function view(): View
    {
        return view('reportes.admin.transacciones', [
            'transacciones' => $this->transacciones
        ]);
    }
}
