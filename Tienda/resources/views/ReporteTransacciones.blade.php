@extends("template.layout")

@section('contenido')

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Id del Comprador</th>
        <th scope="col">Id del Producto</th>
        <th scope="col">Cantidad Comprada</th>

        
</tr>
</thead>

<tbody>
<h1>Descripcion: {{$titulo}}</h1>

    @foreach($transaccion as $item)
    <tr>
        <th>{{$item->ID}}</th>
        <td> {{$item->ID_COMPRADOR}}</td>
        <td> {{$item->ID_PRODUCTO}}</td>
        <td> {{$item->CANTIDAD}}</td>
    </tr>
    @endforeach

    
</tbody>
</table>
@endsection
