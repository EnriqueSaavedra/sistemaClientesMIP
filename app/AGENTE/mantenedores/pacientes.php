<?php
require_once(Link::include_file('clases/DAO/PacientesDAO.php'));
$app = new MensajeSistema();
$pacienteDao = new PacientesDAO();
try { 
    if(isset($_GET['message']))
        throw new UserException($_GET['message'], UserException::ERROR);  

    if($_POST['Submit'] == 'Agregar'){
        $paciente = new Paciente();
        $paciente->setRut(Paciente::limpiarRut($_POST['rutMant']));
        $paciente->setNombre($_POST['nombreMant']);
        $fechaNacimiento = new DateTime(str_replace("/","-", $_POST['fechaMant']));
        $paciente->setFecha_nacimiento($fechaNacimiento->format('Y-m-d'));
        $paciente->setTelefono($_POST['telMant']);
        $paciente->setEmail($_POST['emailMant']);
        $paciente->setRegion($_POST['administrative_area_level_1']);
        $paciente->setCiudad($_POST['locality']);
        $paciente->setCalle($_POST['route']);
        $paciente->setNumero_calle($_POST['street_number']);
        if(!$pacienteDao->crearPaciente($paciente))
            throw new UserException("Imposible Crear Paciente.", UserException::ERROR);    
    }else if($_POST['Submit'] == 'Editar'){
        $paciente = new Paciente();
        $paciente->setId($_POST['idPacienteMant']);
        $paciente->setRut(Paciente::limpiarRut($_POST['rutMant']));
        $paciente->setNombre($_POST['nombreMant']);
        $fechaNacimiento = new DateTime(str_replace("/","-", $_POST['fechaMant']));
        $paciente->setFecha_nacimiento($fechaNacimiento->format('Y-m-d'));
        $paciente->setTelefono($_POST['telMant']);
        $paciente->setEmail($_POST['emailMant']);
        $paciente->setRegion($_POST['administrative_area_level_1']);
        $paciente->setCiudad($_POST['locality']);
        $paciente->setCalle($_POST['route']);
        $paciente->setNumero_calle($_POST['street_number']);
        if(!$pacienteDao->editarPaciente($paciente))
            throw new UserException("Imposible Editar Paciente.", UserException::ERROR);
    }
    
    if($_POST['Submit'] == 'Buscar'){
        $busqueda = $_POST['busqueda'];
        if(trim($busqueda) == "")
            $pacienteArray = $pacienteDao->getAllPacientes();
        else
            $pacienteArray = $pacienteDao->getPacienteByName($busqueda);
    }else{
        $pacienteArray = $pacienteDao->getAllPacientes();
    }
} catch(UserException $e){
    $app->addMessage($e->getMessage(), $e->getCode());
} catch(Exception $e){
    PHPLogger::LogError($e->getMessage(),$e->getCode(), PHPLogger::ERROR, $e);   
} finally {
    if(empty($pacienteArray))
        $pacienteArray = $pacienteDao->getAllPacientes();
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
    .pac-container.pac-logo{
        z-index: 1000000;
    }
</style>
<h2>Pacientes</h2>
<hr>
<div class="row">
    <div class="col-md-12">
        <h3>Listado de Pacientes</h3>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-block btn-success agregar">
            Agregar Nueva Pacientes <span class="glyphicon glyphicon-plus agregar"></span>
        </button>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <form action="#" style="margin:0px !important;" name="buscarPaciente" method="POST">
            <input type="hidden" value="Buscar" name="Submit"/>
            <div class="col-md-12 col-lg-12 text-center" >  
                <div class="input-group">
                    <input type="text" name="busqueda" style="border-radius: 15px 0px 0px 15px" autocomplete="off" class="form-control inputBuscar" value="<?=$busqueda?>" placeholder="Buscar por nombre de paciente">
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
            <th style="width: 5%;text-align: center;">RUT</th>
            <th style="width: 15%;text-align: center;">Nombre</th>
            <th style="width: 5%;text-align: center;">Edad</th>
            <th style="width: 10%;text-align: center;">Telefono</th>
            <th style="width: 10%;text-align: center;">Email</th>
            <th style="width: 15%;text-align: center;">Direccion</th>
            <th style="width: 10%;text-align: center;">Editar</th>
            </thead>
            <tbody>
                <?php  if(empty($pacienteArray)){ ?>
                <tr>
                    <td align="center" colspan="10">--NO SE ENCUENTRAN PACIENTES CREADOS--</td>
                </tr>
                <?php }else{ 
                        /*@var $value Paciente*/
                        foreach ($pacienteArray as $key => $value) { ?>
                <tr>
                    <td align="center" class="valor-rut"><?=$value->getRut()?></td>
                    <td align="center"><?=$value->getNombre()?></td>
                    <td align="center"><?=$value->getEdad()?></td>
                    <td align="center"><?=$value->getTelefono()?></td>
                    <td align="center"><?=$value->getEmail()?></td>
                    <td align="center">
                        <?php if(!empty($value->getCalle())){ ?>
                            <?=$value->getCalle()?>
                            <?php if(!empty($value->getNumero_calle())){ ?>
                                , # <?=$value->getNumero_calle()?>
                            <?php }
                        }else {  ?>
                                Sin Registro
                        <?php  } ?>
                    </td>
                    <td align="center">
                        <button
                            style="padding: 0px !important;"
                            data-id="<?=$value->getId()?>"
                            data-rut="<?=$value->getRut()?>"
                            data-nombre="<?=$value->getNombre()?>"
                            data-fecha-nacimiento="<?=$value->getFechaFormatoChile()?>"
                            data-telefono="<?=$value->getTelefono()?>"
                            data-email="<?=$value->getEmail()?>"
                            data-ciudad="<?=$value->getCiudad()?>"
                            data-region="<?=$value->getRegion()?>"
                            data-calle="<?=$value->getCalle()?>"
                            data-n-calle="<?=$value->getNumero_calle()?>"
                            class="btn btn-block btn-primary editar"
                            type="button">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                    </td>
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
            <form name="actionMantenedorPaciente" action="#" method="POST" class="form-horizontal">
                <input type="hidden" name="idPacienteMant"/>
                <input type="hidden" name="Submit"/>
                <div class="form-group">
                    <label for="rutMant" class="col-sm-2 control-label">Rut</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="rutMant" name="rutMant" placeholder="Ej: XX.XXX.XXX-X">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombreMant" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombreMant" name="nombreMant" placeholder="Ej: Nombre Paciente">
                    </div>
                </div>
                <div class="form-group">
                    <label for="fechaMant" class="col-sm-2 control-label">Fecha Nacimiento</label>
                    <div class="input-group date col-sm-10" style="padding-right: 15px;padding-left: 15px;">
                        <input type="text" readonly=""  data-date-format="dd/mm/yyyy" autocomplete="off" id="fechaMant" name="fechaMant" class="form-control datepicker">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="telMant" class="col-sm-2 control-label">Telefono</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="telMant" name="telMant" placeholder="Ej: X XXX XXX XX">
                    </div>
                </div>
                <div class="form-group">
                    <label for="emailMant" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="emailMant" name="emailMant" placeholder="Ej: email@gmail.com">
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="administrative_area_level_1" id="administrative_area_level_1"/>
                    <input type="hidden" name="locality"  id="locality"/>
                    <input type="hidden" name="route" id="route"/>
                    <input type="hidden" name="street_number" id="street_number"/>
                    <label for="dirMant" class="col-sm-2 control-label">Dirección</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" onFocus="geolocate()" id="dirMant" name="dirMant" placeholder="Ej: Calle #XXX">
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
      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        administrative_area_level_1: 'short_name',
        locality: 'long_name'
      };
    $(document).ready(function(){
        
        var rutValido = false;
        $("input[name=rutMant]").rut({
            formatOn: 'keyup',
            minimumLength: 8, // validar largo mínimo; default: 2
            validateOn: 'change' // si no se quiere validar, pasar null
        }).on('rutInvalido', function(e) {
            rutValido = false;
            $(this).closest("div.form-group").addClass('has-error');
        }).on('rutValido',function(e){
            rutValido = true;
            $(this).closest("div.form-group").removeClass('has-error');
        });
        
        $('.valor-rut').each(function(i,e){
           $(e).text($.formatRut($(e).text())); 
        });
        
        $('button.agregar').click(function(){
            $('.titulo-modal').text("Agregar Nuevo Paciente");
            var form = $('form[name=actionMantenedorPaciente]');
            form.find('input[name=idPacienteMant]').val(""); 
            form.find('input[name=nombreMant]').val(""); 
            form.find('input[name=rutMant]').val(""); 
            form.find('input[name=fechaMant]').val(""); 
            form.find('input[name=telMant]').val(""); 
            form.find('input[name=emailMant]').val(""); 
            form.find('input[name=dirMant]').val(""); 
            form.find('input[name=administrative_area_level_1]').val(""); 
            form.find('input[name=locality]').val(""); 
            form.find('input[name=route]').val(""); 
            form.find('input[name=street_number]').val("");
            //seteo campos
            form.find('input[name=rutMant]').prop("readonly",false); 
            form.find('input[name=Submit]').val("Agregar");
            $('#modalMantenedor').modal('show');
            
        });
        
        $('button.confirmar-guardar').click(function(){
            var form = $('form[name=actionMantenedorPaciente]');
            var nombre = form.find('input[name=nombreMant]').val(); 
            var rut = form.find('input[name=rutMant]').val(); 
            var submit = form.find('input[name=Submit]').val();
            if(rut.trim() == ""){
                notificar("Nombre no puede estar vacío.",'warning',5000);
                return false;
            }else{
                rutValido = $.validateRut(rut);
                if(!rutValido){
                   
                    notificar("Rut incorrecto.",'warning',5000);
                    return false;
                }
            }
            if(nombre.trim() == ""){
                notificar("Nombre no puede estar vacío.",'warning',5000);
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
            var rut = $(this).data('rut');
            var nombre = $(this).data('nombre');
            var fecha = $(this).data('fecha-nacimiento');
            var telefono = $(this).data('telefono');
            var email = $(this).data('email');
            var calle = $(this).data('calle');
            var nCalle = $(this).data('n-calle');
            var region = $(this).data('region');
            var ciudad = $(this).data('ciudad');
            var dirVal = "";
            if(calle != ""){
                dirVal = calle;
                dirVal += (nCalle == "") ? "" : " "+nCalle;
                dirVal += (ciudad == "") ? "" : ", "+ciudad;
                dirVal += (region == "") ? "" : ", "+region;
            }  
            
            $('.titulo-modal').text("Editar Paciente: "+nombre);
            var form = $('form[name=actionMantenedorPaciente]');
            form.find('input[name=idPacienteMant]').val(id); 
            form.find('input[name=nombreMant]').val(nombre); 
            form.find('input[name=rutMant]').val($.formatRut(String(rut))); 
            form.find('input[name=fechaMant]').val(fecha); 
            form.find('input[name=telMant]').val(telefono); 
            form.find('input[name=emailMant]').val(email); 
            //sreer
            form.find('input[name=administrative_area_level_1]').val(region); 
            form.find('input[name=locality]').val(ciudad); 
            form.find('input[name=route]').val(calle); 
            form.find('input[name=street_number]').val(nCalle); 
            //fin street 
            form.find('input[name=dirMant]').val(dirVal); 
            form.find('input[name=Submit]').val("Editar");
            //seteo campos
            form.find('input[name=rutMant]').prop("readonly",true); 
            $('#modalMantenedor').modal('show');
        });
        $('#modalMantenedor').on('shown.bs.modal', function () {
            $('.date').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                endDate:'-1d',
                language:'es'
            });
        });
    });      

      function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('dirMant')),{types: ['geocode']});
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        var place = autocomplete.getPlace();
        for (var component in componentForm) {
          document.getElementById(component).value = '';
        }
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
  
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuBCFNd-SFWSe0BenIwm-_LrlqRlkr_eQ&libraries=places&callback=initAutocomplete"
        async defer></script>