@extends("template.layout")

@section('contenido')

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Stock</th>
        <th scope="col">Estado</th>
        <th scope="col">Id de Vendedor</th>

        
</tr>
</thead>

<tbody>
<h1>Descripcion: {{$titulo}}</h1>

    @foreach($producto as $item)
    <tr>
        <th>{{$item->ID}}</th>
        <td> {{$item->NOMBRE}}</td>
        <td> {{$item->DESCRIPCION}}</td>
        <td> {{$item->CANTIDAD}}</td>
        <td> {{$item->ESTADO}}</td>
        <td> {{$item->ID_VENDEDOR}}</td>
    </tr>
    @endforeach

    
</tbody>
</table>
@endsection
