<div class="container">
    <h3 style="text-align: center"><strong>REPORTE DE PRODUCTOS</strong></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="vertical-align: middle; background-color: #D44C4C" scope="col" width="5">ID</th>
                <th style="vertical-align: middle; background-color: #D44C4C" scope="col" width="15">Producto</th>
                <th style="vertical-align: middle; background-color: #D44C4C" scope="col" width="100">Descripción</th>
                <th style="vertical-align: middle; background-color: #D44C4C" scope="col" width="10">Cantidad</th>
                <th style="vertical-align: middle; background-color: #D44C4C" scope="col" width="50">Categorias</th>
                <th style="vertical-align: middle; background-color: #D44C4C" scope="col" width="15">Transacciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto['id'] }} </td>
                    <td>{{ $producto['nombre'] }}</td>
                    <td>{{ $producto['descripcion'] }}</td>
                    <td>{{ $producto['cantidad'] }}</td>
                    <td class="text-center">
                        @foreach ($producto['categorias'] as $categoria)
                            {{ $categoria['nombre'] }}
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $producto['transacciones_count'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
