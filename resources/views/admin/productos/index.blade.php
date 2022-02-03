@extends('layouts.app')
@section('breadcrumb')
    <li class="active">
        <a>
            <i class="fas fa-box"></i> Productos
        </a>
    </li>
@endsection
@section('content')
@section('titulo', '| Administrar Productos')
<div>
    <h1 class="text-danger text-center font-weight-bold">Administración de Productos</h1>
    @livewire('admin.productos.lista-productos')
</div>
@endsection
