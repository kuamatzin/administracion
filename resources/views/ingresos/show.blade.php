@extends('layouts.app')
@section('content')
<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="/obras/{{$obra->id}}" class="btn btn-warning">Atras</a>
                <div class="row">
                    <div class="col-md-6">
                        <h1>{{$obra->name}} - Ingresos</h1>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <a class="btn btn-primary pull-right" data-toggle="modal" href='#create_income'>Registrar Ingreso</a>
                    </div>
                </div>
                <hr>
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
                           @foreach($obra->incomes->reverse() as $key => $income)
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
    <!-- Modals -->
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
    @include('scripts.ingresos');
@endsection