@extends('layouts.app')
@section('content')
<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h1>{{$gasto_general->name}}</h1>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <a class="btn btn-primary pull-right" data-toggle="modal" href='#create_type_expenditure'>Crear Tipo de Gasto</a>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tipo de gasto</th>
                                <th>Deducible</th>
                                <th>No Deducible</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gasto_general->expenditure_types as $key => $tipo_gasto)
                                <tr>
                                    <td>{{$tipo_gasto->name}}</td>
                                    <td>{{$tipo_gasto->deductible_expenditures(true)}}</td>
                                    <td>{{$tipo_gasto->no_deductible_expenditures(true)}}</td>
                                    <td>{{$tipo_gasto->total(true)}}</td>
                                    <td>
                                        <a href="/tipo_gasto/{{$tipo_gasto->id}}" class="btn btn-primary">Administrar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="create_type_expenditure">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Crear Tipo de Gasto</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required', 'v-model' => 'nombre', ' v-bind:placeholder' => 'placeholder_nombre']) !!}
                            <small style="color:red" v-if="errors.name">Este campo es obligatorio</small>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" v-on:click="create_expenditure_type">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    @include('scripts.gastos_generales')
@endsection