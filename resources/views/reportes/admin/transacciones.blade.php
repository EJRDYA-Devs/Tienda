<div class="container">
    <h3 style="text-align: center"><strong>REPORTE DE TRANSACCIONES REALIZADAS</strong></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="vertical-align: middle; background-color: #D44C4C" scope="col" width="5">ID</th>
                <th style="vertical-align: middle; background-color: #D44C4C" scope="col" width="15">Producto</th>
                <th style="vertical-align: middle; background-color: #D44C4C" scope="col" width="25">Comprador</th>
                <th style="vertical-align: middle; background-color: #D44C4C" class="px-4 py-2 text-center" width="15">
                    Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transacciones as $transaccion)
                <tr>
                    <td>{{ $transaccion['id'] }} </td>
                    <td>{{ $transaccion['producto'] }}</td>
                    <td>{{ $transaccion['comprador'] }}</td>
                    <td class="text-center">
                        {{ $transaccion['cantidad'] }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
