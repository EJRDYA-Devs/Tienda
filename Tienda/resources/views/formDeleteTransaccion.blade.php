@extends("template.layout")

@section('contenido')

<form action="/transaccionEliminada/{ID}" method="delete" role="form">
    {{csrf_field() }}

  <div class="form-group">
    <label for="">Id de Transaccion</label>
    
  
    <select class="form-control"  name="ID" >
        @foreach($transaccion as $item)
        <option value="{{$item ->ID}}"> {{$item ->ID}}</option>
        @endforeach
       
    </select>
    <a class="btn btn-danger" href="/transaccionEliminada/{{$item ->ID}}" >Delete</a>
   </div>

</form>


@endsection