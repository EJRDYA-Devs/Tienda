<div>
    <button type="button" class="btn btn-outline-success mb-2" wire:click.prevent="GenerarExcelSolicitud()">
        <i class="fa fa-file-excel"></i> Generar Reporte
    </button>
    <div class="card">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-lg-4">
                    <label class="col-form-label mr-1 text-dark font-weight-bold">Productos:</label>
                    <select name="" id="" class="form-control" wire:model="producto_id">
                        <option value="" selected disabled>
                            -- Producto --
                        </option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}">Producto: {{ $producto->nombre }} - Cantidad:
                                {{ $producto->cantidad }}
                            </option>
                        @endforeach
                    </select>
                    @error('producto_id')
                        <p class="error-message text-danger font-weight-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group col-lg-4">
                    <label class="col-form-label mr-1 text-dark font-weight-bold">Compradores:</label>
                    <select name="" id="" class="form-control" wire:model="comprador_id">
                        <option value="" selected disabled>
                            -- Comprador --
                        </option>
                        @foreach ($compradores as $comprador)
                            <option value="{{ $comprador->id }}">{{ $comprador->nombre }}</option>
                        @endforeach
                    </select>
                    @error('comprador_id')
                        <p class="error-message text-danger font-weight-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group col-lg-2">
                    <label class="col-form-label mr-1 text-dark font-weight-bold">Cantidad:</label>
                    <input type="number" class="form-control" wire:model="cantidad" placeholder="Agrega una cantidad">
                    @error('cantidad')
                        <p class="error-message text-danger font-weight-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group col-lg-2">
                    <label class="col-form-label mr-1 text-dark font-weight-bold">Guardar:</label><br>
                    <button class="btn btn-success" wire:click.prevent="guardarTransaccion()">Crear Transacción</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row mb-4 justify-content-between">
                <div class="col-lg-2 form-inline">
                    Por Pagina: &nbsp;
                    <select wire:model="perPage" class="form-control form-control-sm">
                        <option>10</option>
                        <option>15</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                </div>
                <div class="col-lg-3">
                    <input wire:model="search" class="form-control" type="text" placeholder="Buscar Transacción...">
                </div>
            </div>
            <div class="row table-responsive">

                <table class="table table-striped table-sortable table-bordered">
                    <thead>
                        <tr>
                            <th style="vertical-align: bottom" class="px-4 py-2 text-left"
                                wire:click.prevent="sortBy('transacciones.id')" role="button">
                                <a class="text-primary" href="#">
                                    Id
                                </a>
                                @include('includes._sort-icon', ['field' => 'transacciones.id'])
                            </th>
                            <th style="vertical-align: bottom" class="px-4 py-2 text-left"
                                wire:click.prevent="sortBy('productos.nombre')" role="button">
                                <a class="text-primary" href="#">
                                    Producto
                                </a>
                                @include('includes._sort-icon', ['field' => 'productos.nombre'])
                            </th>
                            <th style="vertical-align: bottom" class="px-4 py-2 text-left"
                                wire:click.prevent="sortBy('usuarios.nombre')" role="button">
                                <a class="text-primary" href="#">
                                    Comprador
                                </a>
                                @include('includes._sort-icon', ['field' => 'usuarios.nombre'])
                            </th>
                            <th style="vertical-align: bottom" class="px-4 py-2 text-left"
                                wire:click.prevent="sortBy('transacciones.cantidad')" role="button"><a
                                    class="text-primary" href="#">
                                    Cantidad
                                </a>
                                @include('includes._sort-icon', ['field' => 'transacciones.cantidad'])</th>

                            {{-- <th style="vertical-align: bottom" class="px-4 py-2 text-right" colspan="3">Accion</th> --}}
                        </tr>
                    </thead>
                    <tbody class="text-center text-dark">
                        @if ($transacciones->isNotEmpty())
                            @foreach ($transacciones as $transaccion)
                                <tr>
                                    <td class="p-1 text-center  text-dark">{{ $transaccion->id }}</td>
                                    <td class="p-1 text-center  text-dark text-capitalize">
                                        {{ $transaccion->producto }}</td>
                                    <td class="p-1 text-center  text-dark">{{ $transaccion->comprador }}</td>
                                    <td class="p-1 text-center  text-dark">{{ $transaccion->cantidad }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10">
                                    <p class="text-center">No hay resultado para la busqueda
                                        <strong>{{ $search }}</strong> en la pagina
                                        <strong>{{ $page }}</strong> al mostrar <strong>{{ $perPage }}
                                        </strong> por pagina
                                    </p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col">
                    {{ $transacciones->links() }}
                </div>
                <div class="col text-right text-muted">
                    Mostrar {{ $transacciones->firstItem() }} a {{ $transacciones->lastItem() }} de
                    {{ $transacciones->total() }} registros
                </div>
            </div>
        </div>
    </div>
</div>
