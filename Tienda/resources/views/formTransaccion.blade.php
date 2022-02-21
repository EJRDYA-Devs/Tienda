@extends("template.layout")

@section('contenido')

<div class="card p-5">

    <div class="card-header text-center bg-info text-white" style="width: 500px;">TRANSACCIONES</div>
    <div class="card-body bg-info" style="width: 500px;">

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
<br>
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

  <br>
  <div class="form-group">
    <label for="">Numero de Unidades a adquirir</label>
    <input type="number" class="form-control" name="cantidad" placeholder="Ingrese la cantidad que comprara">
 <span style="color:red">@error('cantidad'){{$message}}@enderror</span>
  </div>
<br>
  <button type="submit" class="btn btn-success">Crear</button>


</form>


    </div>
</div>

@endsection