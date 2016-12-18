@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Registrar nuevo proyecto</h3>
                    </div>
                    <div class="panel-heading">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            {!! Form::label('nombre', 'Nombre de Proyecto') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('nombre') }}</small>
                        </div>
                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            {!! Form::label('photo', 'Foto del proyecto') !!}
                            {!! Form::file('photo', ['required' => 'required']) !!}
                            <p class="help-block">Adjunta foto del proyecto</p>
                            <small class="text-danger">{{ $errors->first('photo') }}</small>
                        </div>
                        <a href="/home" class="btn btn-success">Registrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection