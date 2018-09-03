<?php
require_once(Link::include_file('clases/DAO/ServiciosDAO.php'));
$app = new MensajeSistema();
try { 
    if(isset($_GET['message']))
        throw new UserException($_GET['message'], UserException::ERROR);  
    
    $serviciosDao = new ServiciosDAO();
    if($_POST['Submit'] == 'Eliminar'){
        $id = $_POST['id'];
        $serviciosDao->eliminarServicioById($id);
    }else if($_POST['Submit'] == 'Agregar'){
        $servicio = new Servicio();
        $servicio->setNombre($_POST['nombreMant']);
        $servicio->setPrecio($_POST['precioMant']);
        $servicio->setTiempo_estimado($_POST['tiempoMant']);
        $servicio->setDetalle($_POST['detalleMant']);
        if(!$serviciosDao->crearServicio($servicio))
            throw new UserException("Imposible Crear Servicio.", UserException::ERROR);    
    }else if($_POST['Submit'] == 'Editar'){
        $servicio = new Servicio();
        $servicio->setId($_POST['idServicioMant']);
        $servicio->setNombre($_POST['nombreMant']);
        $servicio->setPrecio($_POST['precioMant']);
        $servicio->setTiempo_estimado($_POST['tiempoMant']);
        $servicio->setDetalle($_POST['detalleMant']);
        if(!$serviciosDao->editarServicio($servicio))
            throw new UserException("Imposible Editar Servicio.", UserException::ERROR);
    } 
    
    if($_POST['Submit'] == 'Buscar'){
        $busqueda = $_POST['busqueda'];
        if(trim($busqueda) == "")
            $serviciosArray = $serviciosDao->getAllServicios();
        else
            $serviciosArray = $serviciosDao->getServicioByName($busqueda);
    }else{
        $serviciosArray = $serviciosDao->getAllServicios();
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
<h2>Servicios</h2>
<hr>
<div class="row">
    <div class="col-md-12">
        <h3>Listado de Servicios</h3>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-block btn-success agregar">
            Agregar Nuevo Servicio <span class="glyphicon glyphicon-plus agregar"></span>
        </button>
    </div>
    <div class="col-md-6 col-md-offset-3">
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
    </div>
    <div class="col-md-12">&nbsp;</div>
    <div class="col-md-12" style="max-height: 300px;overflow-x: hidden;overflow-y: scroll;">
        <table class="table table-striped">
            <thead>
            <th style="width: 5%;text-align: center;">N°</th>
            <th style="width: 15%;text-align: center;">Nombre</th>
            <th style="width: 15%;text-align: center;">Precio (CLP)</th>
            <th style="width: 15%;text-align: center;">Min. Estimados</th>
            <th style="width: 30%;text-align: center;">Detalle</th>
            <th style="width: 10%;text-align: center;">Editar</th>
            <th style="width: 10%;text-align: center;">Eliminar</th>
            </thead>
            <tbody>
                <?php  if(empty($serviciosArray)){ ?>
                <tr>
                    <td align="center" colspan="7">--NO SE ENCUENTRAN SERVICIOS CREADOS--</td>
                </tr>
                <?php }else{ 
                        /*@var $value Servicio*/
                        foreach ($serviciosArray as $key => $value) { ?>
                <tr>
                    <td align="center"># <?=$value->getId()?></td>
                    <td align="center"><?=$value->getNombre()?></td>
                    <td align="center">$ <?=$value->getPrecioDisplay()?></td>
                    <td align="center"><?=$value->getTiempo_estimado()?></td>
                    <td align="center"><?=$value->getDetalleParcial()?></td>
                    <td align="center">
                        <button
                            style="padding: 0px !important;"
                            data-id="<?=$value->getId()?>"
                            data-nombre="<?=$value->getNombre()?>"
                            data-precio="<?=$value->getPrecio()?>"
                            data-detalle="<?=$value->getDetalle()?>"
                            data-tiempo="<?=$value->getTiempo_estimado()?>"
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
<form action="#" method="POST" name="actionEliminarServicio">
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
            <form name="actionMantenedorServicio" action="#" method="POST" class="form-horizontal">
                <input type="hidden" name="idServicioMant"/>
                <input type="hidden" name="Submit"/>
                <div class="form-group">
                    <label for="nombreMant" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombreMant" name="nombreMant" placeholder="Ej: Nombre servicio">
                    </div>
                </div>
                <div class="form-group">
                    <label for="precioMant" class="col-sm-2 control-label">Precio</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="precioMant" id="precioMant" placeholder="Ej: 10000">
                    </div>
                </div>
                <div class="form-group">
                    <label for="tiempoMant" class="col-sm-2 control-label">Tiempo (Min.)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="tiempoMant" id="tiempoMant" placeholder="Ej: 30">
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
        <h4 class="modal-title">Eliminar Servicio</h4>
      </div>
      <div class="modal-body">
          <p>Realmente desea eliminar el servicio "<b><span class="eliminar-servicio"></span></b>"</p>
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
            $('.eliminar-servicio').text(nombre);
            $('#modalEliminar').modal('show');
        });
        
        $('#modalEliminar').on('hide.bs.modal', function () {
            identificador = 0;
        });
        
        $('.confirmar-eliminar').click(function() {
            var form = $('form[name=actionEliminarServicio]');
            if(identificador == 0){
                notificar("No se ha encontado el servicio a eliminar.",'danger',5000);
                return false;
            }
            form.find('input[name=id]').val(identificador);
            form.submit();
        });
        
        $('button.agregar').click(function(){
            $('.titulo-modal').text("Agregar Nuevo Servicio");
            var form = $('form[name=actionMantenedorServicio]');
            form.find('input[name=nombreMant]').val(""); 
            form.find('input[name=precioMant]').val(""); 
            form.find('input[name=tiempoMant]').val(""); 
            form.find('textarea[name=detalleMant]').val("");
            form.find('input[name=Submit]').val("Agregar");
            $('#modalMantenedor').modal('show');
            
        });
        
        $('button.confirmar-guardar').click(function(){
            var form = $('form[name=actionMantenedorServicio]');
            var nombre = form.find('input[name=nombreMant]').val();
            var precio = form.find('input[name=precioMant]').val();
            var detalle = form.find('textarea[name=detalleMant]').val();
            var tiempo = form.find('input[name=tiempoMant]').val();
            var submit = form.find('input[name=Submit]').val();
            var validoSubmit = true;
            if(nombre.trim() == ""){
                notificar("Nombre no puede estar vacío.",'warning',5000);
                return false;
            }
            if(precio.trim() == "" || precio.trim() == "0"){
                notificar("Precio no puede estar vacío o tener un valor 0.",'warning',5000);
                return false;
            }
            if(detalle.trim() == ""){
                notificar("Detalle no puede estar vacío.",'warning',5000);
                return false;
            }
            if(tiempo.trim() == "" || tiempo.trim() == "0"){
                notificar("Tiempo no puede estar vacío o tener un valor 0.",'warning',5000);
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
            var precio = $(this).data('precio');
            var detalle = $(this).data('detalle');
            var tiempo = $(this).data('tiempo');
            $('.titulo-modal').text("Editar Servicio: "+nombre);
            var form = $('form[name=actionMantenedorServicio]');
            form.find('input[name=idServicioMant]').val(id); 
            form.find('input[name=nombreMant]').val(nombre); 
            form.find('input[name=precioMant]').val(precio); 
            form.find('input[name=tiempoMant]').val(tiempo); 
            form.find('textarea[name=detalleMant]').val(detalle);
            form.find('input[name=Submit]').val("Editar");
            //seteo campos
            $('#modalMantenedor').modal('show');
        });
    });
</script>