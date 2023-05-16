<?php

function con (){
    $conexion=new mysqli("localhost","root","","cao");
    return $conexion;
}

?>