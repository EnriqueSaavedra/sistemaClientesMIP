<?php
$app = new MensajeSistema();
try { 
    if(isset($_GET['message']))
        throw new UserException($_GET['message'], UserException::ERROR);
    
    if($_POST['Submit'] == 'Submit'){
        $email = $_POST['inputEmail'];
        $pass = $_POST['inputPassword'];
        
        if(empty($email) || empty($pass))
            throw new UserException("Usuario no valido.", UserException::WARNING);
        
        $usuarioDao = new UsuarioDAO();
        if($usuarioDao->loginUsuario($email, $pass)){
            Link::redirect($_SESSION['USUARIO']['CTX'], 'home');
        }
    }else if(!empty($_SESSION['USUARIO'])){
        Link::redirect($_SESSION['USUARIO']['CTX'], 'home');
    }
} catch(UserException $e){
    $app->addMessage($e->getMessage(), $e->getCode());
} catch(Exception $e){
    PHPLogger::LogError($e->getMessage(),$e->getCode(), PHPLogger::ERROR, $e);   
}
?>
<form action="#" class="form-signin" method="POST">
    <h2 class="form-signin-heading text-success">Ingresar</h2>
    <label for="inputEmail" class="sr-only">Usuario</label>
    <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="EMAIL" value="test@gmail.com" required autofocus>
    <label for="inputPassword" class="sr-only">Clave</label>
    <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Clave" value="123" required>
    <div class="checkbox">
        <label>
          <input type="checkbox" value="remember-me"> Mantener sesión abierta
        </label>
    </div>
    <button class="btn btn-lg btn-success btn-block" type="submit">Ingresado</button>
    <input type="hidden" value="Submit" name="Submit"/>
</form>