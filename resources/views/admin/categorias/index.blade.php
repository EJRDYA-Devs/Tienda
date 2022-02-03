@extends('layouts.app')
@section('breadcrumb')
    <li class="active"><a>
            <i class="fas fa-box"></i> Categorias</li>
    </a></li>
@endsection
@section('content')
@section('titulo', '| Administrar Categorias')
<div>
    <h1 class="text-danger text-center font-weight-bold">Administración de Categorias</h1>
    {{-- @livewire('admin.categorias-list') --}}
</div>
@endsection
