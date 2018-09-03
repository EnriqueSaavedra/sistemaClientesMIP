<?php
require_once(Link::include_file('clases/DAO/PatologiaDAO.php'));
$app = new MensajeSistema();
try { 
    if(isset($_GET['message']))
        throw new UserException($_GET['message'], UserException::ERROR);  
    
    $patologiaDao = new PatologiaDAO();
    if($_POST['Submit'] == 'Eliminar'){
        $id = $_POST['id'];
        $patologiaDao->eliminarPatologiaById($id);
    }else if($_POST['Submit'] == 'Agregar'){
        $patologia = new Patologia();
        $patologia->setNombre($_POST['nombreMant']);
        $patologia->setDetalle($_POST['detalleMant']);
        if(!$patologiaDao->crearPatologia($patologia))
            throw new UserException("Imposible Crear Patologia.", UserException::ERROR);    
    }else if($_POST['Submit'] == 'Editar'){
        $patologia = new Patologia();
        $patologia->setId($_POST['idPatologiaMant']);
        $patologia->setNombre($_POST['nombreMant']);
        $patologia->setDetalle($_POST['detalleMant']);
        if(!$patologiaDao->editarPatologia($patologia))
            throw new UserException("Imposible Editar Patologia.", UserException::ERROR);
    } 
    
    if($_POST['Submit'] == 'Buscar'){
        $busqueda = $_POST['busqueda'];
        if(trim($busqueda) == "")
            $patologiaArray = $patologiaDao->getAllPatologias();
        else
            $patologiaArray = $patologiaDao->getPatologiaByName($busqueda);
    }else{
        $patologiaArray = $patologiaDao->getAllPatologias();
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
<h2>Patologias</h2>
<hr>
<div class="row">
    <div class="col-md-12">
        <h3>Listado de Patologias</h3>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-block btn-success agregar">
            Agregar Nueva Patologia <span class="glyphicon glyphicon-plus agregar"></span>
        </button>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <form action="#" style="margin:0px !important;" name="buscarPatologia" method="POST">
            <input type="hidden" value="Buscar" name="Submit"/>
            <div class="col-md-12 col-lg-12 text-center" >  
                <div class="input-group">
                    <input type="text" name="busqueda" style="border-radius: 15px 0px 0px 15px" autocomplete="off" class="form-control inputBuscar" value="<?=$busqueda?>" placeholder="Buscar por nombre de patologia">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" style="border-radius: 0px 15px 15px 0px" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12">&nbsp;</div>
    <div class="col-md-12" style="max-height: 300px;overflow-x: hidden;overflow-y: scroll;">
        <table class="table table-striped">
            <thead>
            <th style="width: 5%;text-align: center;">N°</th>
            <th style="width: 15%;text-align: center;">Nombre</th>
            <th style="width: 30%;text-align: center;">Detalle</th>
            <th style="width: 10%;text-align: center;">Editar</th>
            <th style="width: 10%;text-align: center;">Eliminar</th>
            </thead>
            <tbody>
                <?php  if(empty($patologiaArray)){ ?>
                <tr>
                    <td align="center" colspan="5">--NO SE ENCUENTRAN PTALOGIAS CREADAS--</td>
                </tr>
                <?php }else{ 
                        /*@var $value Patologia*/
                        foreach ($patologiaArray as $key => $value) { ?>
                <tr>
                    <td align="center"># <?=$value->getId()?></td>
                    <td align="center"><?=$value->getNombre()?></td>
                    <td align="center"><?=$value->getDetalleParcial()?></td>
                    <td align="center">
                        <button
                            style="padding: 0px !important;"
                            data-id="<?=$value->getId()?>"
                            data-nombre="<?=$value->getNombre()?>"
                            data-detalle="<?=$value->getDetalle()?>"
                            class="btn btn-block btn-primary editar"
                            type="button">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                    </td>
                    <td align="center">
                        <button style="padding: 0px !important;" data-nombre="<?=$value->getNombre()?>" data-id="<?=$value->getId()?>" class="btn btn-block btn-danger eliminar" type="button">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </td>
                </tr>
                <?php   }
                      } ?>
            </tbody>
        </table>
    </div>
</div>
<form action="#" method="POST" name="actionEliminarPatologia">
    <input type="hidden" name="id"/>
    <input name="Submit" type="hidden" value="Eliminar" />
</form>
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
            <form name="actionMantenedorPatologia" action="#" method="POST" class="form-horizontal">
                <input type="hidden" name="idPatologiaMant"/>
                <input type="hidden" name="Submit"/>
                <div class="form-group">
                    <label for="nombreMant" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombreMant" name="nombreMant" placeholder="Ej: Nombre servicio">
                    </div>
                </div>
                <div class="form-group">
                    <label for="detalleMant" class="col-sm-2 control-label">Detalle</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="detalleMant" name="detalleMant" placeholder="Descripción del servicio" rows="3">
                            
                        </textarea>
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
<!--Modal Eliminar-->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Eliminar Patologia</h4>
      </div>
      <div class="modal-body">
          <p>Realmente desea eliminar la patologia "<b><span class="eliminar-patologia"></span></b>"</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger confirmar-eliminar">Eliminar</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        var identificador = 0;
        $('button.eliminar').click(function(){
            identificador = $(this).data("id");
            var nombre = $(this).data("nombre");
            $('.eliminar-patologia').text(nombre);
            $('#modalEliminar').modal('show');
        });
        
        $('#modalEliminar').on('hide.bs.modal', function () {
            identificador = 0;
        });
        
        $('.confirmar-eliminar').click(function() {
            var form = $('form[name=actionEliminarPatologia]');
            if(identificador == 0){
                notificar("No se ha encontado la patologia a eliminar.",'danger',5000);
                return false;
            }
            form.find('input[name=id]').val(identificador);
            form.submit();
        });
        
        $('button.agregar').click(function(){
            $('.titulo-modal').text("Agregar Nueva Patologia");
            var form = $('form[name=actionMantenedorPatologia]');
            form.find('input[name=nombreMant]').val(""); 
            form.find('textarea[name=detalleMant]').val("");
            form.find('input[name=Submit]').val("Agregar");
            $('#modalMantenedor').modal('show');
            
        });
        
        $('button.confirmar-guardar').click(function(){
            var form = $('form[name=actionMantenedorPatologia]');
            var nombre = form.find('input[name=nombreMant]').val();
            var detalle = form.find('textarea[name=detalleMant]').val();
            var submit = form.find('input[name=Submit]').val();
            if(nombre.trim() == ""){
                notificar("Nombre no puede estar vacío.",'warning',5000);
                return false;
            }
            if(detalle.trim() == ""){
                notificar("Detalle no puede estar vacío.",'warning',5000);
                return false;
            }
            if(submit.trim() == ""){
                notificar("Error al enviar formulario, no se detecta comando.",'danger',5000);
                return false;
            }
            $('#modalMantenedor').modal('hide');
            form.submit();
        });
        
        $('button.editar').click(function(){
            var id = $(this).data('id');
            var nombre = $(this).data('nombre');
            var detalle = $(this).data('detalle');
            $('.titulo-modal').text("Editar Patologia: "+nombre);
            var form = $('form[name=actionMantenedorPatologia]');
            form.find('input[name=idPatologiaMant]').val(id); 
            form.find('input[name=nombreMant]').val(nombre); 
            form.find('textarea[name=detalleMant]').val(detalle);
            form.find('input[name=Submit]').val("Editar");
            //seteo campos
            $('#modalMantenedor').modal('show');
        });
    });
</script>