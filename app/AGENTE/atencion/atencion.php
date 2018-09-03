<?php
require_once(Link::include_file('clases/DAO/AtencionDAO.php'));
require_once(Link::include_file('clases/DAO/PacientesDAO.php'));
require_once(Link::include_file('clases/DAO/ServiciosDAO.php'));
$app = new MensajeSistema();
try { 
    if(isset($_GET['message']))
        throw new UserException($_GET['message'], UserException::ERROR);  
    
    $atencionDao = new AtencionDAO();
    $serviciosDao = new ServiciosDAO();
    $pacienteDao = new PacientesDAO();
    $usuarioDao = new UsuarioDAO();
    
    $servCombo  = $serviciosDao->getServiciosCombo();
    $pacieCombo = $pacienteDao->getPacientesCombo();
    $podoCombo  = $usuarioDao->getPodologoCombo();
    
    
    if($_POST['Submit'] == 'Agregar'){
        $atencion = new Atencion();
        $atencion->setPaciente_id($_POST['pacienteMant']);
        $atencion->setServicio_id($_POST['seviMant']);
        $atencion->setPodologo($_POST['podoMant']);
        $atencion->setPrecio($_POST['precioMant']);
        $now = new DateTime();
        $fechaAtencion = new DateTime(str_replace("/","-", $_POST['fechaMant']));
        $atencion->setFecha($fechaAtencion->format('Y-m-d H:i:s'));
        $atencion->setFecha_registro($now->format('Y-m-d H:i:s'));
        $atencion->setDescripcion($_POST['comentMant']);
        if(!$atencionDao->registrarAtencion($atencion))
            throw new UserException("Imposible Crear Atencion.", UserException::ERROR);    
    }
    
    if($_POST['Submit'] == 'Buscar'){
        $busqueda = $_POST['busqueda'];
        if(trim($busqueda) == "")
            $atencionArray = $atencionDao->getAtencionesDia();
//        else
//            $atencionArray = $atencionDao->getServicioByName($busqueda);
    }else{
        $atencionArray = $atencionDao->getAtencionesDia();
    }
} catch(UserException $e){
    $app->addMessage($e->getMessage(), $e->getCode());
} catch(Exception $e){
    PHPLogger::LogError($e->getMessage(),$e->getCode(), PHPLogger::ERROR, $e);   
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
    textarea {
        resize: none;
    }
</style>
<h2>Atención</h2>
<hr>
<div class="row">
    <div class="col-md-12">
        <h3>Crear Atención</h3>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-block btn-success agregar">
            Registrar Atención <span class="glyphicon glyphicon-plus agregar"></span>
        </button>
    </div>
<!--    <div class="col-md-6 col-md-offset-3">
        <form action="#" style="margin:0px !important;" name="buscarServicio" method="POST">
            <input type="hidden" value="Buscar" name="Submit"/>
            <div class="col-md-12 col-lg-12 text-center" >  
                <div class="input-group">
                    <input type="text" name="busqueda" style="border-radius: 15px 0px 0px 15px" autocomplete="off" class="form-control inputBuscar" value="<?=$busqueda?>" placeholder="Buscar por nombre de servicio">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" style="border-radius: 0px 15px 15px 0px" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </div>
        </form>
    </div>-->
    <div class="col-md-12">&nbsp;</div>
    <div class="col-md-12" style="max-height: 300px;overflow-x: hidden;overflow-y: scroll;">
        <table class="table table-striped">
            <thead>
            <th style="width: 5%;text-align: center;">N°</th>
            <th style="width: 15%;text-align: center;">Paciente</th>
            <th style="width: 15%;text-align: center;">Servicio</th>
            <th style="width: 15%;text-align: center;">Podologo</th>
            <th style="width: 10%;text-align: center;">Precio</th>
            <th style="width: 20%;text-align: center;">Fecha Hora</th>
            <th style="width: 20%;text-align: center;">Descipcion</th>
            </thead>
            <tbody>
                <?php  if(empty($atencionArray)){ ?>
                <tr>
                    <td align="center" colspan="7">--NO SE HAN REGISTRADO ATENCIONES POR HOY--</td>
                </tr>
                <?php }else{ 
                        /*@var $value Atencion*/
                        foreach ($atencionArray as $key => $value) { ?>
                <tr>
                    <td align="center"># <?=$value->getNumero()?></td>
                    <td align="center"><?=$pacienteDao->getPacienteNameById($value->getPaciente_id())?></td>
                    <td align="center"><?=$serviciosDao->getServicioNameById($value->getServicio_id())?></td>
                    <td align="center"><?=$usuarioDao->getUsuarioNameById($value->getPodologo())?></td>
                    <td align="center">$ <?=$value->getPrecioDisplay()?></td>
                    <td align="center"><?=$value->getFechaFormatoChile()?></td>
                    <td align="center"><?=$value->getDetalleParcial()?></td>
                </tr>
                <?php   }
                      } ?>
            </tbody>
        </table>
    </div>
</div>
<!--Modal Mantenedor-->
<div class="modal fade" id="modalMantenedor" tabindex="-1" role="dialog" aria-labelledby="modalMantenedorLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><span class="titulo-modal"></span></h4>
        </div>
        <div class="modal-body">
            <!-- Form -->
            <form name="actionMantenedorAtencion" action="#" method="POST" class="form-horizontal">
                <input type="hidden" name="Submit"/>
                <div class="form-group">
                    <label for="pacienteMant" class="col-sm-2 control-label">Paciente</label>
                    <div class="col-sm-10">
                        <select class="selectpicker" id="pacienteMant" name="pacienteMant" data-live-search="true" data-width="100%">
                            <?php foreach($pacieCombo as $key => $value){  ?>
                                <option value="<?=$value['id']?>"><?=$value['nombre']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="seviMant" class="col-sm-2 control-label">Servicio</label>
                    <div class="col-sm-10">
                        <select class="selectpicker" id="seviMant" name="seviMant" data-live-search="true" data-width="100%">
                            <?php foreach($servCombo as $key => $value){  ?>
                                <option data-precio-base="<?=$value['precio']?>" value="<?=$value['id']?>"><?=$value['nombre']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="podoMant" class="col-sm-2 control-label">Podologo</label>
                    <div class="col-sm-10">
                        <select class="selectpicker" id="podoMant" name="podoMant" data-live-search="true" data-width="100%">
                            <?php foreach($podoCombo as $key => $value){  ?>
                                <option value="<?=$value['id']?>"><?=$value['nombre']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fechaMant" class="col-sm-2 control-label">Fecha Atención</label>
                    <div class="input-group date col-sm-10" style="padding-right: 15px;padding-left: 15px;">
                        <input type="text" readonly=""  data-date-format="dd/mm/yyyy" autocomplete="off" id="fechaMant" name="fechaMant" class="form-control datepicker">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="precioMant" class="col-sm-2 control-label">Monto</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="precioMant" id="precioMant" placeholder="Ej: 30000">
                    </div>
                </div>
                <div class="form-group">
                    <label for="comentMant" class="col-sm-2 control-label">Comentarios</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="comentMant" name="comentMant" placeholder="Comentario de la atencion..." rows="3"></textarea>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-success confirmar-guardar">Guardar Cambios</button>
        </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        
        $('button.agregar').click(function(){
            $('.titulo-modal').text("Registrar Nueva Atencion");
            var form = $('form[name=actionMantenedorAtencion]');
            form.find('input[name=pacienteMant]').val("");
            form.find('input[name=seviMant]').val("");
            form.find('input[name=fechaMant]').val(""); 
            form.find('textarea[name=podoMant]').val("");
            form.find('textarea[name=comentMant]').val("");
            form.find('input[name=Submit]').val("Agregar");
            $('#modalMantenedor').modal('show');
            
        });
        $('#modalMantenedor').on('shown.bs.modal', function () {
            var serivicio = $('#seviMant');
            var precio = $("#seviMant option[value=" + serivicio.val() + "]").data('precio-base');
            $('#precioMant').val(precio);
            $('.date').datetimepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                startDate:'0d',
                language:'es'
            });
        });
        
        $('#seviMant').change(function () {
            var precio = $("option[value=" + $(this).val() + "]", this).data('precio-base');
            $('#precioMant').val(precio);
        }); 
        
        $('button.confirmar-guardar').click(function(){
            var form = $('form[name=actionMantenedorAtencion]');
            var paciente = form.find('input[name=pacienteMant]').val();
            var servicio = form.find('input[name=seviMant]').val();
            var fecha = form.find('input[name=fechaMant]').val();
            var podologo = form.find('textarea[name=podoMant]').val();
            var monto = form.find('input[name=precioMant]').val();
            var submit = form.find('input[name=Submit]').val();
            var validoSubmit = true;
            if(paciente){
                notificar("Paciente no puede estar vacío.",'warning',5000);
                return false;
            }
            if(servicio){
                notificar("Servicio no puede estar vacío.",'warning',5000);
                return false;
            }
            if(podologo){
                notificar("Podologo no puede estar vacío.",'warning',5000);
                return false;
            }
            if(monto.trim() == "" || monto.trim() == "0"){
                notificar("Monto no puede estar vacío o tener un valor 0.",'warning',5000);
                return false;
            }
            if(submit.trim() == ""){
                notificar("Error al enviar formulario, no se detecta comando.",'danger',5000);
                return false;
            }
            $('#modalMantenedor').modal('hide');
            form.submit();
        });
    });
</script>