<div class="box box-info padding-1">
    <div class="box-body">
        
    <!-- Formulario Producto -->
        <div class="form-group">
            {{ Form::label('NOMBRE') }}
            {{ Form::text('NOMBRE', $producto->NOMBRE, ['class' => 'form-control' . ($errors->has('NOMBRE') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('NOMBRE', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('DESCRIPCION') }}
            {{ Form::text('DESCRIPCION', $producto->DESCRIPCION, ['class' => 'form-control' . ($errors->has('DESCRIPCION') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('DESCRIPCION', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CANTIDAD') }}
            {{ Form::text('CANTIDAD', $producto->CANTIDAD, ['class' => 'form-control' . ($errors->has('CANTIDAD') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('CANTIDAD', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_categoria') }}
            {{ Form::text('id_categoria', $producto->id_categoria, ['class' => 'form-control' . ($errors->has('id_categoria') ? ' is-invalid' : ''), 'placeholder' => 'Id Categoria']) }}
            {!! $errors->first('id_categoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ID_VENDEDOR') }}
            {{ Form::text('ID_VENDEDOR', $producto->ID_VENDEDOR, ['class' => 'form-control' . ($errors->has('ID_VENDEDOR') ? ' is-invalid' : ''), 'placeholder' => 'Id Vendedor']) }}
            {!! $errors->first('ID_VENDEDOR', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>