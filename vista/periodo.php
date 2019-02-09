<?php

require_once '../session/seguridad.php';

?>
<!DOCTYPE html>
<html>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <title>Escuela - Periodo</title>
    <meta name="description" content="Example">
    
    <?php include("../vista/js/periodo_ajax.php") ?>
    
</head>

<body id="dashboard" class="full-layout  nav-right-hide nav-right-start-hide  nav-top-fixed      responsive    clearfix" data-active="dashboard "  data-smooth-scrolling="1">     
    <div class="vd_body">
        
        <div class="content">
            <div class="container">

                <!-- ******************** CONTENIDO DE LA PESTAÑA(CABECERA MENU / CABECERA FORMULARIO / CUERPO) ******************** -->
                <div class="vd_content-wrapper">
                    <div class="vd_container">
                        <div class="vd_content clearfix">


                            <!-- ******************** CABECERA BARRA DE MENU ******************** -->
                            <div class="vd_head-section clearfix">
                                <div class="vd_panel-header">

                                    <ul class="breadcrumb">
                                        <li><a href="../vista/inicio.php">Inicio</a> </li>
                                        <li class="active">Periodo</li>
                                    </ul>

                                    <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
                                        <div data-action="remove-navbar" data-original-title="Retirar Barra de Menu Verticar" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                                        <div data-action="remove-header" data-original-title="Retirar Barra Menu Cabecera" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                                        <div data-action="fullscreen" data-original-title="Retirar Barra de Menu Vertical y Cabecera" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                                    </div>

                                </div>
                            </div>


                            <!-- ******************** CABECERA DE LA PESTAÑA(TITULO Y SUBTITULO) ******************** -->
                            <div class="vd_title-section clearfix">
                                <div class="vd_panel-header">
                                    <h1>Periodo</h1>
                                    <small class="subtitle">Mantenimiento Periodo</small>
                                </div>
                            </div>


                            <!-- ******************** CUERPO DE LA PESTAÑA, CONTENIDO O INFORMACION DE LA PESTAÑA(BUSCAR) ******************** -->
                            <div class="vd_content-section clearfix">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel widget light-widget panel-bd-left">
                                            <div class="panel-body table-responsive">

                                                <!-- ******************************************************************************************** -->

                                                <table class="table table-striped dt-responsive nowrap" cellspacing="0" id="t_periodo" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Periodo</th>
                                                            <th>Estado</th>
                                                            <th>[ . ]</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tb_periodo">
                                                                
                                                    </tbody>
                                                </table>
                                                <button class="btn vd_btn vd_bg-blue" data-toggle="modal" data-target="#modalPeriodo" data-accion="registrar"><span class="append-icon"><i class="fa fa-plus fa-fw"></i></span>Agregar</button>

                                                <!-- ******************************************************************************************** -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php include('../vista/form/periodo_modal.php') ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <script type="text/javascript">
        $(document).ready(function() {
            "use strict";
            Periodo.ListarPeriodo();

            $('#form_periodo').on('submit', function (e) {
                var accion = $("#form_periodo #accion").val();
                if (accion == "crear_periodo") {
                    Periodo.CrearPeriodo();
                } else if (accion == "actualizar_periodo") {
                    Periodo.ActualizarPeriodo();
                }
                return false;
            });

            $('#modalPeriodo').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var recipient = button.data('accion');
                var modal = $(this);
                if(recipient === "registrar"){
                    modal.find('.modal-title').text('Mantenimiento ' + recipient);
                    $("#form_periodo").append("<input type='hidden' name='accion' id='accion' value='crear_periodo'>");
                    // $("#btn_accion_periodo").attr('onclick', 'Periodo.CrearPeriodo();');
                }else{
                    modal.find('.modal-title').text('Mantenimiento ' + recipient);
                    $("#form_periodo").append("<input type='hidden' name='accion' id='accion' value='actualizar_periodo'>");
                    // $("#btn_accion_periodo").attr('onclick', 'Periodo.ActualizarPeriodo();');
                }
            });

            $('#modalPeriodo').on('hidden.bs.modal', function (event) {
                $("#form_periodo #accion").remove();
                $("#form_periodo #idperiodo").val('');
                $("#form_periodo #periodo").val('');
                $("#form_periodo #estado").val('1');
            });
        });
    </script>

</body>
</html>