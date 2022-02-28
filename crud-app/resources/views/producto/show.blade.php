@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? 'Show Producto' }}
@endsection

@section('content')

<!-- Mostrar Producto -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $producto->NOMBRE }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $producto->DESCRIPCION }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $producto->CANTIDAD }}
                        </div>
                        <div class="form-group">
                            <strong>Id Categoria:</strong>
                            {{ $producto->id_categoria }}
                        </div>
                        <div class="form-group">
                            <strong>Id Vendedor:</strong>
                            {{ $producto->ID_VENDEDOR }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
