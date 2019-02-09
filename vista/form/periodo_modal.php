<!-- Modal Periodo -->
<div class="modal fade" id="modalPeriodo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <form class="form-horizontal" id="form_periodo" name="form_periodo" action="../controlador/accion_periodo.php" method="POST">
                <div class="modal-body"> 
                    <!-- <form class="form-horizontal" id="form_periodo" name="form_periodo"> -->
                        <input type="hidden" name="idperiodo" id="idperiodo">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Periodo</label>
                            <div class="col-sm-7 controls">
                                <input type="text" placeholder="Ingresar periodo" name="periodo" id="periodo" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Estado</label>
                            <div class="col-sm-7 controls">
                                <select name="estado" id="estado">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
                <div class="modal-footer background-login">
                    <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Cerrar</button>
                    <input type="submit"  class="btn vd_btn vd_bg-blue" value="Grabar">
                    <!-- <button type="button" class="btn vd_btn vd_bg-blue" id="btn_accion_periodo">Grabar</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal Periodo -->