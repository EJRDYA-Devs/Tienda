@extends('app')

@section('content')
<div class="container">
	  <div class="row">

		<div class="col">
			<div class="border p-4 mt-5">
                <p style="color:Blue;"><strong>TRANSACCIONES</strong></p>
				<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Cantidad</th>
						<th scope="col">Comprador</th>
						<th scope="col">Producto</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($transacciones as $trans)
					<tr>
                        <th>
							{{$trans->cantidad}}
						</th>
						<th>
							{{$trans->comprador}}
						</th>
						<th>
							{{$trans->nombre}}
						</th>
					</tr>
					@endforeach
				</tbody>
				</table>
			</div>
		</div>

		<div class="col">
			<div class="border p-4 mt-5">
                <p style="color:Blue;"><strong>STOCK ACTUAL</strong></p>
				<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Nombre</th>
						<th scope="col">Descripción</th>
						<th scope="col">Stock</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($productos as $producto)
					<tr>
						<th>
							{{$producto->nombre}}
						</th>
						<th>
							{{$producto->descripcion}}
						</th>
						<th>
							{{$producto->cantidad}}
						</th>
					</tr>
					@endforeach
				</tbody>
				</table>
			</div>
		</div>

	  </div>
</div>

@endsection