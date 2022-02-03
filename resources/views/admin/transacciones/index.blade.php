@extends('layouts.app')
@section('breadcrumb')
    <li class="active">
        <a>
            <i class="fas fa-box"></i> Transacciones
        </a>
    </li>
@endsection
@section('content')
@section('titulo', '| Administrar Transacciones')
<div>
    <h1 class="text-danger text-center font-weight-bold">Administración de Transacciones</h1>
    @livewire('admin.transacciones.lista-transacciones')

</div>
@endsection
