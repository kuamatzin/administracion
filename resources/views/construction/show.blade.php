@extends('layouts.app')
@section('content')
<div>
    <div class="container" id="app">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="/obras" class="btn btn-warning">Atras</a>
                        <h1>{{$obra->name}}</h1>
                    </div>
                    <div class="panel-body">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Resumen de Proyecto</h3>
                            </div>
                            <div class="panel-body">
                                {!! $chart->render() !!}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class="panel-title">Ingresos</h3>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a class="btn btn-primary pull-right" data-toggle="modal" href='#create_income'>Agregar Ingreso</a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="/ingreso/{{$obra->id}}" class="btn btn-warning">Administrar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <h3>Últimos 5 ingresos</h3>
                                       <div class="table-responsive">
                                           <table class="table table-hover">
                                               <thead>
                                                   <tr>
                                                       <th>Concepto</th>
                                                       <th>Cantidad</th>
                                                       <th>Número de cuenta</th>
                                                       <th>Banco</th>
                                                   </tr>
                                               </thead>
                                               <tbody>
                                                   @foreach($obra->incomes->reverse()->take(5) as $key => $income)
                                                   <tr>
                                                       <td>{{$income->concept}}</td>
                                                       <td>${{$income->quantity}}</td>
                                                       <td>{{$income->account->account_number}}</td>
                                                       <td>{{$income->account->bank}}</td>
                                                   </tr>
                                                   @endforeach
                                               </tbody>
                                           </table>
                                       </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class="panel-title">Gastos</h3>
                                            </div>
                                            <div class="col-md-6">
                                                <a class="btn btn-primary pull-right" data-toggle="modal" href='#create_general_expenditure'>Agregar Categoría</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th>Gasto General</th>
                                                        <th>Deducible</th>
                                                        <th>No deducible</th>
                                                    </tr>
                                                    @foreach($obra->general_expenditures as $key => $gasto_general)
                                                    <tr>
                                                        <td>{{$gasto_general->name}}</td>
                                                        <td>{{$gasto_general->general_deductible(true)}}</td>
                                                        <td>{{$gasto_general->general_no_deductible(true)}}</td>
                                                        <td>
                                                            <a href="/gasto_general/{{$gasto_general->id}}" class="btn btn-primary">Administrar</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODALS -->
    <div class="modal fade" id="create_general_expenditure">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Crear Gasto General</h4>
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
                    <button type="button" class="btn btn-primary" v-on:click="create_general_expenditure">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="create_income">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Registrar Ingreso</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('concept', 'Concepto') !!}
                        {!! Form::text('concept', null, ['class' => 'form-control', 'v-model' => 'concept',]) !!}
                        <small class="text-danger" v-if="errors_incomes.concept">@{{errors_incomes.concept[0]}}</small>
                    </div>

                    <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                        {!! Form::label('quantity', 'Cantidad') !!}
                        {!! Form::text('quantity', null, ['class' => 'form-control', 'v-model' => 'quantity']) !!}
                        <small class="text-danger" v-if="errors_incomes.quantity">@{{errors_incomes.quantity[0]}}</small>
                    </div>
                    
                    <div class="form-group{{ $errors->has('account_id') ? ' has-error' : '' }}">
                        {!! Form::label('account_id', 'Cuenta') !!}
                        {!! Form::select('account_id', [0 => 'Cuenta', 1 => 'Bancomer', 2 => 'Santander', 3 => 'IXE'], null, ['id' => 'account_id', 'class' => 'form-control', 'v-model' => 'account_id']) !!}
                        <small class="text-danger" v-if="errors_incomes.account_id">@{{errors_incomes.account_id[0]}}</small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" v-on:click="create_income">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    @include('scripts.obras')
<script>
@endsection