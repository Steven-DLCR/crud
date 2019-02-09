<script>
    var Periodo = {
        ListarPeriodo: function () {
            $.ajax({
                url: "../controlador/accion_periodo.php",
                type: "POST",
                data: "accion=listar_periodo",
                dataType: "json",
                cache: false,
                beforeSend: function () {
                    $("body").append('<div id="loader-wrapper"><div id="loader"></div></div>');
                },
                success: function (obj) {
                    if (obj.rst === 1) {
                        var html = "";
                        var buttonEstado = "";
                        $.each(obj.datos, function (index, data) {
                            buttonEstado = '<button class="btn vd_btn vd_bg-green" type="button" onclick="Periodo.ActualizarEstadoPeriodo(0, ' + data.idperiodo + ')">&nbsp;Activo&nbsp;&nbsp;</button>';
                            if (data.estado == 0) {
                                buttonEstado = '<button class="btn vd_btn vd_bg-red" type="button" onclick="Periodo.ActualizarEstadoPeriodo(1, ' + data.idperiodo + ')">Inactivo</button>';
                            }
                            html += "<tr>";
                            html += "<td>" + data.periodo + "</td>";
                            html += "<td>" + buttonEstado + "</td>";
                            html += '<td><a class="btn vd_btn vd_round-btn btn-sm vd_bg-blue mgr-10" data-toggle="modal" data-target="#modalPeriodo" data-accion="actualizar" onclick="Periodo.BuscarPeriodo(' + data.idperiodo + ')"><i class="fa fa-edit fa-fw "></i></a></td>';
                            html += "</tr>";
                        })
                        $("#t_periodo").dataTable().fnDestroy();
                        $("#tb_periodo").html(html);
                        $("#t_periodo").dataTable();
                        $(".overlay, .loading-img").remove();

                    } else {
                        notification("topright", "notify", "fa fa-exclamation-triangle vd_yellow", "Advertencia", obj.msj);
                    }
                    $("#loader-wrapper, #loader").remove();
                },
                error: function () {
                    notification("topright", "error", "fa fa-exclamation-circle vd_red", "Error Notificacion", "Se a producido un error\nPongace en Contacto al correo: stevem.dlcr@gmail.com", 7000);
                }
            })
        },
        CrearPeriodo: function () {
            var periodo = $("#form_periodo #periodo").val();
            var estado = $("#form_periodo #estado").val();
            $.ajax({
                url: "../controlador/accion_periodo.php",
                type: "POST",
                data: "accion=crear_periodo" + "&periodo=" + periodo + "&estado=" + estado,
                dataType: "json",
                cache: false,
                success: function (obj) {
                    if (obj.rst === 1) {
                        Periodo.ListarPeriodo();
                        $('#modalPeriodo').modal('hide');
                        notification("topright", "success", "fa fa-check-circle vd_green", "Notificacion", obj.msj);
                    } else {
                        notification("topright", "notify", "fa fa-exclamation-triangle vd_yellow", "Advertencia", obj.msj);
                    }
                },
                error: function () {
                    notification("topright", "error", "fa fa-exclamation-circle vd_red", "Error Notificacion", "Se a producido un error\nPongace en Contacto al correo: stevem.dlcr@gmail.com", 7000);
                }
            })
        },
        BuscarPeriodo: function (idperiodo) {
            $.ajax({
                url: "../controlador/accion_periodo.php",
                type: "POST",
                data: "accion=buscar_periodo" + "&idperiodo=" + idperiodo,
                dataType: "json",
                cache: false,
                success: function (obj) {
                    if (obj.rst === 1) {
                        $("#form_periodo #idperiodo").val(obj.datos['idperiodo']);
                        $("#form_periodo #periodo").val(obj.datos['periodo']);
                        $("#form_periodo #estado").val(obj.datos['estado']);
                    } else {
                        notification("topright", "notify", "fa fa-exclamation-triangle vd_yellow", "Advertencia", obj.msj);
                    }
                },
                error: function () {
                    notification("topright", "error", "fa fa-exclamation-circle vd_red", "Error Notificacion", "Se a producido un error\nPongace en Contacto al correo: stevem.dlcr@gmail.com", 7000);
                }
            })
        },
        ActualizarPeriodo: function () {
            var idperiodo = $("#form_periodo #idperiodo").val();
            var periodo = $("#form_periodo #periodo").val();
            var estado = $("#form_periodo #estado").val();
            $.ajax({
                url: "../controlador/accion_periodo.php",
                type: "POST",
                data: "accion=actualizar_periodo" + "&idperiodo=" + idperiodo + "&periodo=" + periodo + "&estado=" + estado,
                dataType: "json",
                cache: false,
                success: function (obj) {
                    if (obj.rst === 1) {
                        Periodo.ListarPeriodo();
                        $('#modalPeriodo').modal('hide');
                        notification("topright", "success", "fa fa-check-circle vd_green", "Notificacion", obj.msj);
                    } else {
                        notification("topright", "notify", "fa fa-exclamation-triangle vd_yellow", "Advertencia", obj.msj);
                    }
                },
                error: function () {
                    notification("topright", "error", "fa fa-exclamation-circle vd_red", "Error Notificacion", "Se a producido un error\nPongace en Contacto al correo: stevem.dlcr@gmail.com", 7000);
                }
            })
        },
        ActualizarEstadoPeriodo: function (estado, idperiodo) {
            $.ajax({
                url: "../controlador/accion_periodo.php",
                type: "POST",
                data: "accion=actualizar_estado_periodo" + "&estado=" + estado + "&idperiodo=" + idperiodo,
                dataType: "json",
                cache: false,
                beforeSend: function () {

                },
                success: function (obj) {
                    if (obj.rst === 1) {
                        Periodo.ListarPeriodo();
                        notification("topright", "success", "fa fa-check-circle vd_green", "Notificacion", obj.msj);
                    } else {
                        notification("topright", "notify", "fa fa-exclamation-triangle vd_yellow", "Advertencia", obj.msj);
                    }
                },
                error: function () {
                    notification("topright", "error", "fa fa-exclamation-circle vd_red", "Error Notificacion", "Se a producido un error\nPongace en Contacto al correo: stevem.dlcr@gmail.com", 7000);
                }
            })
        }
    }
</script>