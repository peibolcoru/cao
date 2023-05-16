<?php
session_start();
if(isset($_SESSION["admin"])){
include("./../funciones.php");
$codcli=$_POST["codigo"];
// Cambiamos el estado del cliente a 1 para añadirlo al ticket
$sql_cambioestado="UPDATE cliente SET estado_cli='1'
                WHERE cod_cli='$codcli'";
$ejec_cambioestado=con()->query($sql_cambioestado);
}
else{
    echo "<script>
    alert('Area restringida');
    window.location.href='./../index.html';
    </script>";
}
?>