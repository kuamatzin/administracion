@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Mis Proyectos</p>
                        </div>
                        <div class="col-md-3 col-md-offset-3">
                            <a  href="/obras/create" class="btn btn-primary">Crear Nuevo Proyecto</a>
                        </div>
                    </div>
                </div>
                @foreach($obras as $key => $obra)
                    <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>{{$obra->name}}</h3>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <a href="/obras/{{$obra->id}}" class="btn btn-info pull-right">Administar Proyecto</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <img src="http://imganuncios.mitula.net/venta_de_departamento_por_entrada_norte_a_lomas_de_angelopolis_96747618080010377.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-md-7">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Resumen</h3>
                                </div>
                                <div class="panel-body">
                                    <h3>Gastos</h3>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <td>Gastos deducibles de obra</td>
                                                    <td>{{$obra->deductible_expenditures(true)}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Gastos no deducibles de obra</td>
                                                    <td>{{$obra->no_deductible_expenditures(true)}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Gastos Totales</td>
                                                    <td>{{$obra->total(true)}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <h3>Ingresos</h3>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <td>Ingresos Totales</td>
                                                    <td>{{$obra->total_incomes(true)}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection