 <?php 
$app = new MensajeSistema();
$debugObj = null;
try{
    $debugObj = new Debuger();
 } catch (Exception $e) {
    $app->addMessage($e->getMessage(), UserException::WARNING);
    PHPLogger::LogError($e->getMessage(),$e->getCode(), PHPLogger::ERROR, $e);
}
 ?>
        </div>
    </div>
</div>
<?php 
if(!isset($_GET['noFoot'])){ ?>
    <footer>
            <?php
            if($debugObj != null){
                if($debugObj->isDebug()){
                    $debug = array(
                        'SESSION' => !empty($_SESSION) ? $_SESSION : "NO SESSION",
                        'COOKIE'  => !empty($_COOKIE) ? $_COOKIE : "NO COOKIE",
                        'POST'    => !empty($_POST) ? $_POST : "NO POST",
                        'GET'     => !empty($_GET) ? $_GET : "NO GET",
                        'SERVER'  => !empty($_SERVER) ? $_SERVER : "NO SERVER"
                    ); 
                    echo "<h4>--DEBUG AGENTE--</h4>";
                    printArray($debug);
                }
            }
            ?>
    </footer>
<?php } ?>
<script>    
    $(document).ready(function() {
        var sources = {
            servicios:"<?=Link::getRutaHref('AGENTE', 'mantenedores/servicios')?>",
            pacientes:"<?=Link::getRutaHref('AGENTE', 'mantenedores/pacientes')?>",
            patologia:"<?=Link::getRutaHref('AGENTE', 'mantenedores/patologia')?>",
            atencion:"<?=Link::getRutaHref('AGENTE', 'atencion/atencion')?>"
        };
        
        $('.barra-agente .elemento-menu').click(function(){
            var redirect = ($(this).attr('class').indexOf('activo') != -1);
            $('.barra-agente .elemento-menu').removeClass('activo');
            $(this).addClass('activo');
            if(!redirect)
                return false;
            window.location.href = sources[$(this).data("source")];
        });
        $('#cerrarSesion').click(function (){
            $(this).text("Cerrando....");
            $.ajax({
                method:'POST',
                cache: false,
                url:"<?=Link::getRuta('AGENTE', 'rest/cerrarSesion'); ?>",
            }).done(function (data, textStatus, jqXHR){
                data = JSON.parse(data);
                if(data.success){
                    window.location = "<?=Link::getRutaHref()?>";
                }else{
                    notificar(data.mensaje,"danger",5000);
                }
            }).fail(function( jqXHR, textStatus, errorThrown ) {
                $(this).text("Cerrar Sesión");
                console.error(jqXHR,errorThrown);
                notificar("Error inesperado al cerrar sesión.","danger",5000);
            });
        });
    });
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-18564934-1', 'auto');
    ga('send', 'pageview');
</script>
<script>
    (function($){
        window.notificar = function(mensaje,tipo,tiempo){
            $.notify({
                // options
                icon: 'glyphicon glyphicon-warning-sign',
                title: '<strong>Mensaje de Podologia MIP:</strong>',
                message: mensaje
            },{
                // settings
                element: 'body',
                position: null,
                type: tipo,
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                        from: "bottom",
                        align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: tiempo,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class',
                template: '<div data-notify="container" class="text-center col-xs-11 col-sm-5 alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                        '<span data-notify="icon"></span> ' +
                        '<span data-notify="title">{1}</span> ' +
                        '<span data-notify="message">{2}</span>' +
                        '<div class="progress" data-notify="progressbar">' +
                                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        '</div>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>' 
            });
        };
    })(jQuery);
</script>
</body>
</html>