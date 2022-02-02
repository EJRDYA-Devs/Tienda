<div>
    <button type="button" class="btn btn-outline-success mb-2" wire:click.prevent="generarExcel()"
        wire:target="generarExcel" wire:loading.attr="disabled">
        <i class="fa fa-file-excel"></i> Generar Reporte
    </button>
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
                    <input wire:model="search" class="form-control" type="text" placeholder="Buscar Producto...">
                </div>
            </div>
            <div class="row table-responsive">

                <table class="table table-striped table-sortable table-bordered">
                    <thead>
                        <tr>
                            <th style="vertical-align: bottom" class="px-4 py-2 text-left"
                                wire:click.prevent="sortBy('id')" role="button">
                                <a class="text-primary" href="#">
                                    Id
                                </a>
                                @include('includes._sort-icon', ['field' => 'id'])
                            </th>
                            <th style="vertical-align: bottom" class="px-4 py-2 text-left"
                                wire:click.prevent="sortBy('nombre')" role="button">
                                <a class="text-primary" href="#">
                                    Producto
                                </a>
                                @include('includes._sort-icon', ['field' => 'nombre'])
                            </th>
                            <th style="vertical-align: bottom" class="px-4 py-2 text-left"
                                wire:click.prevent="sortBy('descripcion')" role="button">
                                <a class="text-primary" href="#">
                                    Descripción
                                </a>
                                @include('includes._sort-icon', ['field' => 'descripcion'])
                            </th>
                            <th style="vertical-align: bottom" class="px-4 py-2 text-left"
                                wire:click.prevent="sortBy('cantidad')" role="button">
                                <a class="text-primary" href="#">
                                    Cantidad
                                </a>
                                @include('includes._sort-icon', ['field' => 'cantidad'])
                            </th>
                            <th style="vertical-align: bottom" class="px-4 py-2 text-left">
                                Categorias
                            </th>
                            <th style="vertical-align: bottom" class="px-4 py-2 text-left"
                                wire:click.prevent="sortBy('transacciones_count')" role="button"><a
                                    class="text-primary" href="#">
                                    Transacciones
                                </a>
                                @include('includes._sort-icon', ['field' => 'transacciones.cantidad'])</th>

                            {{-- <th style="vertical-align: bottom" class="px-4 py-2 text-right" colspan="3">Accion</th> --}}
                        </tr>
                    </thead>
                    <tbody class="text-center text-dark">
                        @if ($productos->isNotEmpty())
                            @foreach ($productos as $producto)
                                <tr>
                                    <td class="p-1 text-center  text-dark">{{ $producto->id }}</td>
                                    <td class="p-1 text-center  text-dark text-capitalize">
                                        {{ $producto->nombre }}</td>
                                    <td class="p-1 text-center  text-dark">{{ $producto->descripcion }}</td>
                                    <td class="p-1 text-center  text-dark">{{ $producto->cantidad }}</td>
                                    <td class="p-1 text-center  text-dark">
                                        @foreach ($producto->categorias as $categoria)
                                            <span class="badge badge-danger mr-1">{{ $categoria->nombre }}</span>
                                        @endforeach
                                    </td>
                                    <td class="p-1 text-center  text-dark">{{ $producto->transacciones_count }}</td>
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
                    {{ $productos->links() }}
                </div>
                <div class="col text-right text-muted">
                    Mostrar {{ $productos->firstItem() }} a {{ $productos->lastItem() }} de
                    {{ $productos->total() }} registros
                </div>
            </div>
        </div>
    </div>
</div>
