@extends("template.layout")

@section('contenido')

<form action="/newTransaccion" method="POST" role="form">
  {{csrf_field() }}


  <div class="form-group">
    <label for="">usuarios</label>
    <select class="form-control" name="id_comprador">
      @foreach($usuarios as $item)
      <option value="{{$item ->ID}}"> {{$item ->NOMBRE}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label >Productos</label>
    <select class="form-control" name="id_producto">
      @foreach($productos as $item)
      @if (($item->cantidad) < 1)
    
      <option value="{{$item ->ID}}"> {{$item -> NOMBRE}} con {{$item -> CANTIDAD}} existencias</option>
      @endif
      @endforeach
    </select>
  </div>


  <div class="form-group">
    <label for="">Numero de Unidades a adquirir</label>
    <input type="number" class="form-control" name="cantidad" placeholder="Ingrese la cantidad que comprara">
 <span style="color:red">@error('cantidad'){{$message}}@enderror</span>
  </div>

  <button type="submit" calss="btn btn-primary">Crear</button>


</form>


@endsection