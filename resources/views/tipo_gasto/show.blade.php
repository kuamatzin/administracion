@extends('layouts.app')
@section('content')
<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="/gasto_general/{{$tipo_gasto->general_expenditure->id}}" class="btn btn-warning">Atras</a>
                <div class="row">
                    <div class="col-md-6">
                        <h1>{{$tipo_gasto->name}}</h1>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <a class="btn btn-primary pull-right" data-toggle="modal" href='#crear_gasto'>Crear gasto</a>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Gasto</th>
                                <th>Unidad de medida</th>
                                <th>Costo Unitario</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Tipo de Gasto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tipo_gasto->expenditures as $key => $gasto)
                                <tr>
                                    <td>{{$gasto->concept}}</td>
                                    <td>{{$gasto->measure_unit}}</td>
                                    <td>{{$gasto->getUnitCost()}}</td>
                                    <td>{{$gasto->quantity}}</td>
                                    <td>{{$gasto->getTotal()}}</td>
                                    <td>{{$gasto->getDeductible()}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="crear_gasto">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Crear gasto</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('concept', 'Concepto') !!}
                        {!! Form::text('concept', null, ['class' => 'form-control', 'v-model' => 'concept',]) !!}
                        <small class="text-danger" v-if="errors.concept">@{{errors.concept[0]}}</small>
                    </div>

                    <div class="form-group">
                        {!! Form::label('measure_unit', 'Unidad de medida') !!}
                        {!! Form::text('measure_unit', null, ['class' => 'form-control', 'v-model' => 'measure_unit']) !!}
                        <small class="text-danger" v-if="errors.measure_unit">@{{errors.measure_unit[0]}}</small>
                    </div>

                    <div class="form-group">
                        {!! Form::label('unit_cost', 'Costo Unitario') !!}
                        {!! Form::text('unit_cost', null, ['class' => 'form-control', 'v-model' => 'unit_cost']) !!}
                        <small class="text-danger" v-if="errors.unit_cost">@{{errors.unit_cost[0]}}</small>
                    </div>

                    <div class="form-group">
                        {!! Form::label('quantity', 'Cantidad') !!}
                        {!! Form::text('quantity', null, ['class' => 'form-control', 'v-model' => 'quantity']) !!}
                        <small class="text-danger" v-if="errors.quantity">@{{errors.quantity[0]}}</small>
                    </div>  

                    <div class="form-group">
                        {!! Form::label('total', 'Total') !!}
                        {!! Form::text('total', null, ['class' => 'form-control', 'v-model' => 'total']) !!}
                        <small class="text-danger" v-if="errors.total">@{{errors.total[0]}}</small>
                    </div>

                    <div class="form-group">
                        {!! Form::label('deductible', 'Tipo de egreso') !!}
                        {!! Form::select('deductible',[''=> 'Tipo de egreso', 0 => 'No deducible', 1 => 'Deducible'], null, ['id' => 'deductible', 'class' => 'form-control', 'v-model' => 'deductible']) !!}
                        <small class="text-danger" v-if="errors.deductible">@{{errors.deductible[0]}}</small>
                    </div>

                    <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                        {!! Form::label('company', 'Empresa') !!}
                        {!! Form::select('company', ['' => 'Empresa', 1 => 'Malintzi', 2 => 'Contrucciones S.A. de C.V.', 3 => 'Edificios ROI'], null, ['id' => 'company', 'class' => 'form-control']) !!}
                        <small class="text-danger"v-if="errors.company">@{{errors.company[0]}}</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" v-on:click="create_expenditure">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    @include('scripts.tipos_gasto')
@endsection