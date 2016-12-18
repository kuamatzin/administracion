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

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Proyecto Torre 1 Zona Angelópolis</h3>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <a href="/obras/1" class="btn btn-info pull-right">Administar Proyecto</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <img src="http://imganuncios.mitula.net/venta_de_departamento_por_entrada_norte_a_lomas_de_angelopolis_96747618080010377.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-md-6 col-md-offset-1">
                            <img src="http://www.hermesmarinas.com/img/grafica-consumos-es.jpg" alt="" class="img-responsive">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Proyecto Torre 1 Lomas</h3>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <button type="button" class="btn btn-info pull-right">Administar Proyecto</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <img src="https://i.ebayimg.com/00/s/NjAwWDgwMA==/z/9bAAAOSwjVVVsTPd/$_20.JPG" alt="" class="img-responsive">
                        </div>
                        <div class="col-md-6 col-md-offset-1">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/4/47/FPC_stats,_2007-2010.png" alt="" class="img-responsive">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Casa Residencial Sonata</h3>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <button type="button" class="btn btn-info pull-right">Administar Proyecto</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <img src="http://www.decorablog.com/wp-content/2011/06/Casa-lujosa-Singapur-3.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-md-6 col-md-offset-1">
                            <img src="http://publicradio1.wpengine.netdna-cdn.com/oncampus/files/2011/09/college-stats.jpg" alt="" class="img-responsive">
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
