@extends('app')

@section('content')
<div class="container w-25 border p-4 mt-5">
    <form action="{{ route('transacciones' ) }}" method="POST">
        @csrf
        @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif


        @if( $errors->any())
        <h6 class="alert alert-danger">{{$errors->first() }}</h6>
        @enderror

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="text" class="form-control" autocomplete="off" name="cantidad" id="cantidad">
        </div>
        <label for="cliente_id" class="form-label">Cliente</label>
        <select name="cliente_id" class="form-select">
            @foreach ($clientes as $clie)
            <option value="{{$clie->id}}">{{$clie->nombre}}</option>
            @endforeach
        </select>

        <label for="producto_id" class="form-label">Producto</label>
        <select name="producto_id" class="form-select">
            @foreach ($productos as $prod)
            <option value="{{$prod->id}}">{{$prod->nombre}}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Comprar!</button>

    </form>

</div>

@endsection