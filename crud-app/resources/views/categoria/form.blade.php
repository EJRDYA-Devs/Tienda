
<!-- Formulario de categorias -->
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('NOMBRE') }}
            {{ Form::text('NOMBRE', $categoria->NOMBRE, ['class' => 'form-control' . ($errors->has('NOMBRE') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('NOMBRE', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('DESCRIPCION') }}
            {{ Form::text('DESCRIPCION', $categoria->DESCRIPCION, ['class' => 'form-control' . ($errors->has('DESCRIPCION') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('DESCRIPCION', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>