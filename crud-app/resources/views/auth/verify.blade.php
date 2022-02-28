@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificacion de su Correo') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un link de verificacion fue enviado a su correo') }}
                        </div>
                    @endif

                    {{ __('Chequee su link de verificacion') }}
                    {{ __('Si no recibio el correo') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Requerir otro link') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
