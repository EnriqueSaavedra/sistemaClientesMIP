<?php
$app = new MensajeSistema();
try { 
    if(isset($_GET['message']))
        throw new UserException($_GET['message'], UserException::ERROR);  
} catch(UserException $e){
    $app->addMessage($e->getMessage(), $e->getCode());
} catch(Exception $e){
    PHPLogger::LogError($e->getMessage(),$e->getCode(), PHPLogger::ERROR, $e);   
}
?>
