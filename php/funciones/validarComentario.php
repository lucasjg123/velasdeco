<?php
function validar(){
    $vMensaje='';
    if(trim(strlen($_POST['comentario'])) < 5){
        $vMensaje.="Debes ingresar un minimo de 5 caracteres!";
    }
    
    return $vMensaje;
}


?>